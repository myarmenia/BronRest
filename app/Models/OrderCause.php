<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderCause extends Model
{
    use HasFactory;

    public $table = 'order_cause';

    public $timestamps = false;

    protected $fillable = ['name'];
}
