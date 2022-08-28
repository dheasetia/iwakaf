<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $dates = ['date_start', 'date_end'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(ProjectComment::class);
    }

    public function story()
    {
        return $this->hasOne(Story::class);
    }

    public function get_backers()
    {
        return [
            [
                'name'  => 'Abah',
                'amount'    => 300000
            ],
            [
                'name'  => 'Mamah',
                'amount'    => 500000
            ],
            [
                'name'  => 'Abah',
                'amount'    => 300000
            ],
            [
                'name'  => 'Mamah',
                'amount'    => 500000
            ],
        ];
    }

    public function get_project_summary()
    {
        $current_project_payments = Payment::where('project_id', '=', $this->is)->get();

    }

}
