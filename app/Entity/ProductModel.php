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
    protected $table = 'productModel';
    //指定关联数据库表主键
    protected $primaryKey = 'id';
}