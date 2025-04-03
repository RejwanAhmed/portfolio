<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [
        'serial_no',
        'title',
        'institution',
        'logo',
        'board',
        'result',
        'start_year',
        'end_year',
        'held_on_year'
    ];
}
