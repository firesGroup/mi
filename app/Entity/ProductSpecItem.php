<?php
/**
 * File Name: ProductSpecItem.php
 * Description: 商品规格项表
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/23
 * Time: 23:18
 */
namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class ProductSpecItem extends Model
{
    //指定关联数据库表名
    protected $table = 'product_spec_item';
    //指定关联数据库表主键
    protected $primaryKey = 'id';


    /*
     * 关联所属规格信息
     *
     */
    public function spec()
    {
        $this->belongsTo('App\Entity\ProductSpec','spec_id');
    }
}
