<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_detail';

    protected $fillable = [
        'order_id','p_id','p_price','buy_num'
    ];
}
