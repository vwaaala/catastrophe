<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';

    protected $fillable = ['title', 'slug', 'description', 'uploads', 'status', 'name', 'phone', 'email', 'age'];

    protected $casts = [
        'status' => 'boolean',
        'age' => 'integer',
    ];

    // generate slug from title field
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->slug = static::generateUniqueSlug($model->title);
        });

        static::updating(function ($model) {
            $model->slug = static::generateUniqueSlug($model->title, $model->id);
        });
    }

    protected static function generateUniqueSlug($title, $excludeId = null)
    {
        $slug = str()->slug($title);
        $originalSlug = $slug;
        $counter = 1;

        // Check if the slug exists in the database
        while (
            static::where('slug', $slug)->when($excludeId, function ($query, $excludeId) {
                return $query->where('id', '!=', $excludeId); // Exclude the current model being updated
            })->exists()
        ) {
            $slug = $originalSlug . '-' . $counter++;
        }

        return $slug;
    }


    // posts
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_report');
    }

}

