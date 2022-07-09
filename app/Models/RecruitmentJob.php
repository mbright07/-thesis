<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecruitmentJob extends Model
{
    use HasFactory;

    protected $table = "recruitment_jobs";

    protected $fillable = ['job_id', 'recruitment_id', 'salary'];

    public function recruitment()
    {
        return $this->belongsTo(Recruitment::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'recruitment_job_id');
    }
}
