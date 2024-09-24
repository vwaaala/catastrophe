<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $table = 'donations';

    protected $fillable = ['transactionid', 'amount', 'status', 'name', 'phone', 'email'];

    protected $casts = [
        'amount' => 'decimal:2',
        'status' => 'boolean',
    ];
}

