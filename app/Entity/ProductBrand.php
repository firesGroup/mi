<?php
/**
 * File Name: ProductBrand.php
 * Description: 商品品牌表
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/22
 * Time: 15:26
 */

namespace App\Entity;


use Illuminate\Database\Eloquent\Model;

class ProductBrand extends Model
{
    //指定关联数据库表名
    protected $table = 'product_brand';
    //指定关联数据库表主键
    protected $primaryKey = 'id';
}