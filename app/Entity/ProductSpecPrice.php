<?php
/**
 * File Name: ProductSpecPrice.php
 * Description: 规格价格表
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/26
 * Time: 13:53
 */
namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class ProductSpecPrice extends Model
{
    //指定关联数据库表名
    protected $table = 'product_spec_price';
    //指定关联数据库表主键
    protected $primaryKey = 'id';

    /*
     * 关联所属规格信息
     *
     */
    public function product()
    {
        return $this->belongsTo('App\Entity\Product','p_id','id');
    }

}
