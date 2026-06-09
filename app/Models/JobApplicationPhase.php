<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplicationPhase extends Model
{
    protected $fillable = ['job_application_id', 'phase_name', 'scheduled_at', 'notes', 'outcome'];

    public function jobApplication()
    {
        return $this->belongsTo(JobApplication::class);
    }
}
