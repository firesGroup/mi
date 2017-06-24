<?php
/**
 * File Name: ProductSpec.php
 * Description: 商品规格表
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/23
 * Time: 22:52
 */
namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class ProductSpec extends Model
{
    //指定关联数据库表名
    protected $table = 'product_attribute';
    //指定关联数据库表主键
    protected $primaryKey = 'id';

    protected $fillable = [
        'attr_name'
    ];
}
