<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecruitmentJob extends Model
{
    use HasFactory;

    protected $table = "recruitment_jobs";

    public function recruitment()
    {
        return $this->belongsTo(Recruitment::class);
    }
}
