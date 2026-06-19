<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi
    protected $fillable = [
        'project_name',
        'client_id',
        'project_manager_id',
        'start_date',
        'deadline',
        'budget',
        'status',
        'description',
        'address',
        'image_url'
    ];

    
    protected $casts = [
        'start_date' => 'date',
        'deadline' => 'date',
        'budget' => 'decimal:2', // 2 angka di belakang koma
    ];

    
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function projectManager()
    {
        return $this->belongsTo(Employee::class, 'project_manager_id');
    }

    public function setImageUrlAttribute($value)
    {
        $urls = is_array($value) ? $value : json_decode($value, true);
        if (!is_array($urls)) {
            $urls = $value ? [$value] : [];
        }

        $processedUrls = [];
        foreach ($urls as $url) {
            if (!$url) continue;

            if (str_starts_with($url, 'http')) {
                $processedUrls[] = $url;
                continue;
            }

            // Path to the file
            $localPath = public_path($url);
            if (!file_exists($localPath)) {
                $localPath = storage_path('app/public/' . $url);
            }

            if (file_exists($localPath) && is_file($localPath)) {
                $pathInfo = pathinfo($localPath);
                if (strtolower($pathInfo['extension'] ?? '') !== 'webp') {
                    $mime = mime_content_type($localPath);
                    $image = null;
                    if ($mime === 'image/jpeg' || $mime === 'image/jpg') {
                        $image = imagecreatefromjpeg($localPath);
                    } elseif ($mime === 'image/png') {
                        $image = imagecreatefrompng($localPath);
                        if ($image) {
                            imagepalettetotruecolor($image);
                            imagealphablending($image, true);
                            imagesavealpha($image, true);
                        }
                    } elseif ($mime === 'image/gif') {
                        $image = imagecreatefromgif($localPath);
                        if ($image) {
                            imagepalettetotruecolor($image);
                        }
                    }

                    if ($image) {
                        $newFilename = $pathInfo['filename'] . '.webp';
                        $newLocalPath = $pathInfo['dirname'] . '/' . $newFilename;
                        imagewebp($image, $newLocalPath, 80);
                        imagedestroy($image);
                        unlink($localPath);

                        if (str_contains($url, '/')) {
                            $parts = explode('/', $url);
                            array_pop($parts);
                            $processedUrls[] = implode('/', $parts) . '/' . $newFilename;
                        } else {
                            $processedUrls[] = $newFilename;
                        }
                    } else {
                        $processedUrls[] = $url;
                    }
                } else {
                    $processedUrls[] = $url;
                }
            } else {
                $processedUrls[] = $url;
            }
        }

        $finalValue = count($processedUrls) === 1 ? $processedUrls[0] : (count($processedUrls) > 0 ? json_encode($processedUrls) : null);
        $this->attributes['image_url'] = $finalValue;
    }

    public function getImageUrls()
    {
        $val = $this->attributes['image_url'] ?? null;
        if (!$val) return [];
        
        $decoded = json_decode($val, true);
        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
            return $decoded;
        }

        return [$val];
    }

    public function getDisplayImageAttribute()
    {
        $images = $this->all_display_images;
        return count($images) > 0 ? $images[0] : 'https://images.unsplash.com/photo-1541976590-713941681591?w=1920';
    }

    public function getAllDisplayImagesAttribute()
    {
        $rawImages = $this->getImageUrls();
        if (empty($rawImages)) {
            return ['https://images.unsplash.com/photo-1541976590-713941681591?w=1920'];
        }

        $urls = [];

        foreach ($rawImages as $img) {
            if (str_starts_with($img, 'http')) {
                $urls[] = $img;
            } elseif (str_starts_with($img, 'projects/')) {
                try {
                    $urls[] = \Illuminate\Support\Facades\Storage::disk('public')->url($img);
                } catch (\Exception $e) {
                    $urls[] = 'https://images.unsplash.com/photo-1541976590-713941681591?w=1920';
                }
            } else {
                $urls[] = asset($img);
            }
        }

        return count($urls) > 0 ? $urls : ['https://images.unsplash.com/photo-1541976590-713941681591?w=1920'];
    }
}
