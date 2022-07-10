<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewCandidate extends Model
{
    use HasFactory;

    protected $table = "review_candidates";

    public function recruitmentJob()
    {
        return $this->belongsTo(RecruitmentJob::class);
    }
}
