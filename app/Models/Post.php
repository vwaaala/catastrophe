<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\Category;
use App\Models\Report;
use App\Models\Media;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['title', 'description', 'slug', 'media', 'status'];

    protected $casts = [
        'title' => 'json',
        'description' => 'json',
        'status' => 'boolean',
    ];

    // save slug from title
    protected static function booted()
    {
        static::creating(function ($model) {
            // Decode the JSON title before accessing it
            $titleArray = json_decode($model->title, true);
            $model->slug = str()->slug($titleArray['en'] ?? ''); // Fallback to an empty string if 'en' is not set
        });

        static::updating(function ($model) {
            // Decode the JSON title before accessing it
            $titleArray = json_decode($model->title, true);
            $model->slug = str()->slug($titleArray['en'] ?? '');
        });
    }

    // category 
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // reports
    public function reports()
    {
        return $this->belongsToMany(Report::class, 'post_report');
    }

    // media
    public function media()
    {
        return $this->hasOne(Media::class);
    }
}

