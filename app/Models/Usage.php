<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'key',
        'used',
        'limit',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
