<?php
/**
 * File Name: ProductModel.php
 * Description: 商品模型表
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/22
 * Time: 15:28
 */

namespace App\Entity;


use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    //指定关联数据库表名
    protected $table = 'product_model';
    //指定关联数据库表主键
    protected $primaryKey = 'id';

    protected $fillable = [
        'model_name'
    ];


    /*
     * 关联商品规格
     *
     */
    public function spec()
    {
        return $this->hasMany('App\Entity\ProductSpec','model_id','id');
    }

    /*
     * 关联商品属性
     *
     */
    public function attr()
    {
        return $this->hasMany('App\Entity\ProductAttribute','model_id','id');
    }


}