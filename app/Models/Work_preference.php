<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work_preference extends Model
{
    use HasFactory;

    protected $table = "work_preferences";

    protected $fillable = ['user_id', 'expected_location', 'expected_salary'];
}
