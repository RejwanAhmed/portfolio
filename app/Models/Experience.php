<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Experience extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'company_name',
        'job_title',
        'start_date',
        'end_date',
        'description'
    ];
}
