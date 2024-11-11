<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [
        'title',
        'institution',
        'board',
        'result',
        'start_year',
        'end_year',
        'held_on_year'
    ];
}
