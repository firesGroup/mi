<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'order';

    public $fillable = ['order_sn', 'member_id', 'buy_user', 'buy_phone', 'address', 'total', 'order_status'];

    public function member()
    {
        return $this->belongsTo('App\Entity\Member','member_id');
    }

    public function order_detail()
    {
        return $this->belongsTo('App\Entity\OrderDetail','order_id');
    }
}
