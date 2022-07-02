<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\CssSelector\Node\FunctionNode;
use Illuminate\Database\Query\Builder;
use Symfony\Component\Console\Completion\Suggestion;

class Job extends Model
{
    use HasFactory;

    protected $table = "jobs";

    protected $fillable = ['user_id', 'name', 'description', 'regular_salary', 'type'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function recruitmentJobs()
    {
        return $this->hasMany(RecruitmentJob::class, 'job_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(Subcategory::class, 'sub_category_id');
    }

    public function incrementReadCount()
    {
        $this->totalviews++;
        return $this->save();
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('name', 'LIKE', $term);
        });
    }
}
