<?php
/**
 * File Name: ProductAttibute.php
 * Description: 商品属性表
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/23
 * Time: 22:52
 */
namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    //指定关联数据库表名
    protected $table = 'product_attribute';
    //指定关联数据库表主键
    protected $primaryKey = 'id';

    protected $fillable = [
        'attr_name','model_id','attr_input_type','attr_values'
    ];

    /*
     * 关联所属模型信息
     *
     */
    public function model()
    {
        return $this->belongsTo('App\Entity\ProductModel','model_id','id');
    }

}
