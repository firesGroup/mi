<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'order';

    public $fillable = ['order_sn', 'mid', 'user', 'phone', 'address', 'total', 'order_status'];
}
