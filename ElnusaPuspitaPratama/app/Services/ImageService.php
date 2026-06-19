<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class ImageService
{
    /**
     * Convert an uploaded image to WebP and save it locally.
     *
     * @param UploadedFile $file
     * @param string $directory Directory inside public_path() (e.g., 'images/projects')
     * @param string|null $customName Custom name for the file (without extension)
     * @param int $quality Compression quality (0-100)
     * @return string Relational URL path (e.g., 'images/projects/filename.webp')
     */
    public static function convertToWebp(UploadedFile $file, string $directory = 'images/projects', ?string $customName = null, int $quality = 80): string
    {
        $destinationPath = public_path($directory);
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // Determine name
        $name = $customName 
            ? Str::slug($customName) . '_' . time()
            : time() . '_' . Str::random(10);
        $filename = $name . '.webp';

        // Load image
        $imagePath = $file->getRealPath();
        $mime = $file->getMimeType();

        $image = null;
        if ($mime === 'image/jpeg' || $mime === 'image/jpg') {
            $image = imagecreatefromjpeg($imagePath);
        } elseif ($mime === 'image/png') {
            $image = imagecreatefrompng($imagePath);
            // Maintain alpha transparency
            if ($image) {
                imagepalettetotruecolor($image);
                imagealphablending($image, true);
                imagesavealpha($image, true);
            }
        } elseif ($mime === 'image/gif') {
            $image = imagecreatefromgif($imagePath);
            if ($image) {
                imagepalettetotruecolor($image);
            }
        } elseif ($mime === 'image/webp') {
            $image = imagecreatefromwebp($imagePath);
        }

        if (!$image) {
            // Fallback: if conversion fails, move original file
            $fallbackName = $name . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fallbackName);
            return $directory . '/' . $fallbackName;
        }

        // Save as WebP
        imagewebp($image, $destinationPath . '/' . $filename, $quality);
        imagedestroy($image);

        return $directory . '/' . $filename;
    }

    /**
     * Download a remote image, convert it to WebP, and save it locally.
     *
     * @param string $url
     * @param string $directory
     * @param string|null $customName
     * @param int $quality
     * @return string|null Relational URL path or null on failure
     */
    public static function downloadAndConvertToWebp(string $url, string $directory = 'images/projects', ?string $customName = null, int $quality = 80): ?string
    {
        try {
            $context = stream_context_create([
                'http' => [
                    'header' => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36\r\n"
                ]
            ]);
            $imageData = file_get_contents($url, false, $context);
            if (!$imageData) {
                return null;
            }

            $destinationPath = public_path($directory);
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $name = $customName 
                ? Str::slug($customName) . '_' . time()
                : time() . '_' . Str::random(10);
            $filename = $name . '.webp';

            $tempFile = tempnam(sys_get_temp_dir(), 'img_download');
            file_put_contents($tempFile, $imageData);

            $info = getimagesize($tempFile);
            if (!$info) {
                unlink($tempFile);
                return null;
            }

            $mime = $info['mime'];
            $image = null;
            if ($mime === 'image/jpeg' || $mime === 'image/jpg') {
                $image = imagecreatefromjpeg($tempFile);
            } elseif ($mime === 'image/png') {
                $image = imagecreatefrompng($tempFile);
                if ($image) {
                    imagepalettetotruecolor($image);
                    imagealphablending($image, true);
                    imagesavealpha($image, true);
                }
            } elseif ($mime === 'image/gif') {
                $image = imagecreatefromgif($tempFile);
                if ($image) {
                    imagepalettetotruecolor($image);
                }
            } elseif ($mime === 'image/webp') {
                $image = imagecreatefromwebp($tempFile);
            }

            if (!$image) {
                unlink($tempFile);
                return null;
            }

            imagewebp($image, $destinationPath . '/' . $filename, $quality);
            imagedestroy($image);
            unlink($tempFile);

            return $directory . '/' . $filename;
        } catch (\Exception $e) {
            logger()->error('Failed to download image from ' . $url . ': ' . $e->getMessage());
            return null;
        }
    }
}
