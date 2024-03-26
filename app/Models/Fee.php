<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Receipt;

class Fee extends Model
{
    use HasFactory;

    protected $fillable = [
        'shortname',
        'description',
        'amountdue',
        'amountbalance',
    ];

    public function receipts():HasMany
    {
        return $this->hasMany(Receipt::class);
    }

    
}
