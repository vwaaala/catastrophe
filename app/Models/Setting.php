<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = ['contact_email', 'contact_phone', 'payment_url', 'payment_store', 'payment_signature'];
}

