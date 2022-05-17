<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderJob extends Model
{
    use HasFactory;

    protected $table = "order_jobs";

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
