<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeFee extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_deped',
        'fee_id',
        'receipt_id',
        'status',
    ];

    protected $table = 'employeefees';
}
