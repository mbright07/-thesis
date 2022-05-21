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
}
