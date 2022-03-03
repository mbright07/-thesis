<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = "jobs";

    public static function sort($orderBy, $order = 'ASC')
    {
        return empty($orderBy) ? static::query()
            : static::orderBy($orderBy, $order);
    }
}
