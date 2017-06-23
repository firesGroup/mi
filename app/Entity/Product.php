<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //指定关联数据库表名
    protected $table = 'product';
    //指定关联数据库表主键
    protected $primaryKey = 'id';

    /**
     * 获取商品详情。
     */
    public function detail()
    {
        return $this->hasOne('App\Entity\ProductDetail', 'pid');
    }

    /**
     * 获取商品相册图片集合。
     */
    public function images()
    {
        return $this->hasMany('App\Entity\ProductImages','pid');
    }
}
