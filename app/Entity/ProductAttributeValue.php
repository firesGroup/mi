<?php
/**
 * File Name: ProductAttibuteValue.php
 * Description: 商品属性值表
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/24
 * Time: 22:40
 */
namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
    //指定关联数据库表名
    protected $table = 'product_attribute_value';
    //指定关联数据库表主键
    protected $primaryKey = 'id';

    protected $fillable = [

    ];

}
