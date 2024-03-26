<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Fee;

class Receipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'Shortname',
        'Amountdue',
        'Amountpaid',
        'Change',
        'Fee_id'
    ];

    public function fees(): BelongsTo
    {
        return $this->belongsTo(Fee::class);
    }   
}
