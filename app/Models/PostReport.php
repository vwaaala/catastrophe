<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostReport extends Model
{
    protected $table = 'post_report';

    protected $fillable = ['report_id', 'post_id'];
}

