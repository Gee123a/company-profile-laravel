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
        $this->attributes['image_url'] = is_array($value) ? json_encode($value) : $value;
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
                    $urls[] = \Illuminate\Support\Facades\Storage::disk('cloudinary')->url($img);
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
