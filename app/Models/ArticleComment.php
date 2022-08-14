<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'user_id',
        'comment'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
