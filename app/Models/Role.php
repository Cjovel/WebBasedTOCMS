<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'level',
        'status',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getLevel()
    {
        $levelName = "";

        switch($this->level){
            case 0: $levelName = "Admin"; break;
            case 1: $levelName = "Teaching"; break;
            case 2: $levelName = "Non-Teaching"; break;
        }

        return $levelName;
    }

    public function getStatus()
    {
        $statusName = "";

        switch($this->status){
            case 0: $statusName = "Active"; break;
            case 1: $statusName = "Inactive"; break;
            case 2: $statusName = "Inactive"; break;
        }

        return $statusName;
    }
}
