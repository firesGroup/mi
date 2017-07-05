<?php
/**
 * File Name: ProductDetail.php
 * Description: 商品详情表
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/21
 * Time: 9:01
 */

namespace App\Entity;


use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    //指定关联数据库表名
    protected $table = 'product_detail';
    //指定关联数据库表主键
    protected $primaryKey = 'p_id';

    protected $fillable = [
        'p_id','summary','remind_title','description'
    ];


    public function product()
    {
        return $this->belongsTo('App\Entity\Product','p_id');
    }

    public function getDescriptionAttribute($value)
    {
        return ucfirst($value);
    }

}