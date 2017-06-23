<?php
/**
 * File Name: ProductImages.php
 * Description: 商品相册图片表
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/20
 * Time: 22:42
 */

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    //指定关联数据库表名
    protected $table = 'product_images';
    //指定关联数据库表主键
    protected $primaryKey = 'p_id';

    /**
     * 获取关连联商品信息。
     */
    public function product()
    {
        return $this->belongsTo('App\Entity\Product','pid');
    }
}