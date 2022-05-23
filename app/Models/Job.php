<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\CssSelector\Node\FunctionNode;
use Illuminate\Database\Query\Builder;

class Job extends Model
{
    use HasFactory;

    protected $table = "jobs";

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function recruitmentJobs()
    {
        return $this->hasMany(RecruitmentJob::class, 'job_id');
    }
}
