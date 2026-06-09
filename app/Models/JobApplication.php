<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = ['cv_id', 'company_name', 'title', 'job_url', 'source', 'location', 'salary_min', 'salary_max', 'status', 'application_date', 'notes'];

    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }

    public function phases()
    {
        return $this->hasMany(JobApplicationPhase::class);
    }
}
