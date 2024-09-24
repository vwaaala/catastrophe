<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name', 'slug', 'status'];

    protected $casts = [
        'status' => 'boolean',
    ];

    // save slug from name
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->slug = str()->slug($model->name);
        });

        static::updating(function ($model) {
            $model->slug = str()->slug($model->name);
        });
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}

