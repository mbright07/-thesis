<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = "education";

    protected $fillable = ['user_id', 'subject', 'school', 'qualifications', 'from_month', 'to_month', 'achievements'];
}
