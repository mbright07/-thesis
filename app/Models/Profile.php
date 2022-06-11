<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = "profiles";

    protected $fillable = ['user_id', 'image', 'mobile', 'date_of_birth', 'intro', 'gender', 'marital_status', 'city', 'province', 'country', 'address'];
}
