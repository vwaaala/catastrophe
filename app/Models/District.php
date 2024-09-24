<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';

    protected $fillable = ['name', 'slug', 'status'];

    protected $casts = [
        'status' => 'boolean',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->slug = str()->slug($model->name);
        });

        static::updating(function ($model) {
            $model->slug = str()->slug($model->name);
        });
    }
}

