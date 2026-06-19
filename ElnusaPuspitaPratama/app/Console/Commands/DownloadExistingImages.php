<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DownloadExistingImages extends Command
{
    protected $signature = 'app:download-existing-images';

    protected $description = 'Download remote project images from Cloudinary/Unsplash, convert them to WebP, and store them locally';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $projects = \App\Models\Project::all();
        $this->info("Found {$projects->count()} projects to check.");

        foreach ($projects as $project) {
            $images = $project->getImageUrls();
            if (empty($images)) {
                $this->info("Project #{$project->id} ({$project->project_name}) has no images. Skipping.");
                continue;
            }

            $newImageUrls = [];
            foreach ($images as $img) {
                if (str_starts_with($img, 'http')) {
                    $this->info("Downloading remote image for Project #{$project->id}: {$img}");
                    $localPath = \App\Services\ImageService::downloadAndConvertToWebp($img, 'images/projects', $project->project_name);
                    if ($localPath) {
                        $newImageUrls[] = $localPath;
                        $this->info("Successfully saved as WebP: {$localPath}");
                    } else {
                        $this->error("Failed to download/convert: {$img}. Keeping remote URL.");
                        $newImageUrls[] = $img;
                    }
                } else {
                    // It is a local file already. Let's make sure it is in WebP format
                    $localPath = public_path($img);
                    if (file_exists($localPath) && is_file($localPath)) {
                        $pathInfo = pathinfo($localPath);
                        if (strtolower($pathInfo['extension'] ?? '') !== 'webp') {
                            $this->info("Converting local image to WebP for Project #{$project->id}: {$img}");
                            // Let's trigger the mutator by setting the attribute
                            $project->image_url = [$img];
                            $project->save();
                            // Reload new value
                            $newImageUrls = $project->getImageUrls();
                        } else {
                            $newImageUrls[] = $img;
                        }
                    } else {
                        $newImageUrls[] = $img;
                    }
                }
            }

            if (!empty($newImageUrls)) {
                // If it is a single string vs JSON array, setImageUrlAttribute will handle it
                $project->image_url = count($newImageUrls) === 1 ? $newImageUrls[0] : $newImageUrls;
                $project->save();
                $this->info("Updated database URL for Project #{$project->id}.");
            }
        }

        $this->info('Image migration to WebP completed!');
        return 0;
    }
}
