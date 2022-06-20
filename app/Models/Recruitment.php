<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    use HasFactory;

    protected $table = "recruitments";

    protected $fillable = ['firstname', 'lastname', 'mobile', 'email', 'intro', 'city', 'province', 'country', 'file'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function recruitmentJob()
    {
        return $this->hasMany(RecruitmentJob::class);
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('country', 'LIKE', $term)
                ->orWhere('firstname', 'LIKE', $term)
                ->orWhere('lastname', 'LIKE', $term)
                ->orWhere('email', 'LIKE', $term)
                ->orWhere('mobile', 'LIKE', $term)
                ->orWhere('city', 'LIKE', $term)
                ->orWhere('mobile', 'LIKE', $term);
        });
    }
}
