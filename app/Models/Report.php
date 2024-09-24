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
            $model->slug = str()->slug($model->title);
        });

        static::updating(function ($model) {
            $model->slug = str()->slug($model->title);
        });
    }

    // posts
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_report');
    }

}

