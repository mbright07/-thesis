<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work_history extends Model
{
    use HasFactory;

    protected $table = "work_histories";

    protected $fillable = ['user_id', 'position', 'company', 'from_month', 'to_month', 'description'];
}
