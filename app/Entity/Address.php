<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';

    public $fillable = ['member_id', 'buy_user', 'buy_phone', 'address', 'status'];
}
