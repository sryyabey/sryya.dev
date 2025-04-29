<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UsageLimit extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_id',
        'key',
        'limit',
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
