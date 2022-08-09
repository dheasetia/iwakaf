<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bio extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'phone',
        'address',
        'village',
        'district',
        'city',
        'province',
        'zip_code',
        'avatar_url',
        'level'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
