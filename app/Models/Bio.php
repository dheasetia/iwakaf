<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bio extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone_number',
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

    public function getFullNameAttribute()
    {
        $full_name = strtolower($this->first_name . ' ' . $this->last_name);
        return ucwords($full_name);

    }

}
