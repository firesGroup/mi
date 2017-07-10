<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_detail';

    protected $fillable = [
       'p_id','p_name','p_price','buy_num','order_id'
    ];

    public function order_detail()
    {
        return $this->hasMany('App\Entity\OrderDetail', 'order_id');
    }

    public function product()
    {
        return $this->belongsto('App\Entity\Product','p_id','id');
    }

}
