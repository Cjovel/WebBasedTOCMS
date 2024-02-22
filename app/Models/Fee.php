<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    protected $fillable = [
        'fee_id',
        'shortname',
        'description',
        'amountdue',
        'amountbalance',
    ];
}
