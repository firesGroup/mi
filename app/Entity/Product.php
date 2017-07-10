<?php
/**
 * File Name: Product.php
 * Description: 商品信息表
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/21
 * Time: 22:52
 */
namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //指定关联数据库表名
    protected $table = 'product';
    //指定关联数据库表主键
    protected $primaryKey = 'id';

    protected $fillable = [
        'category_id','p_name','p_num','price','store','status','flag','tags','sell_num','click_num','p_index_image','is_free_shipping','recommend'
    ];

    /**
     * 获取商品详情。
     */
    public function detail()
    {
        return $this->hasOne('App\Entity\ProductDetail', 'p_id');
    }
    /**
     * 获取商品分类。
     */
    public function category()
    {
        return $this->belongsTo('App\Entity\CateGory', 'category_id');
    }

    /*
     *
     *  获取商品版本
     *
     */
    public function versions()
    {
        return $this->hasMany('App\Entity\ProductVersions','p_id');
    }


    public function color()
    {
        return $this->hasMany('App\Entity\ProductVersionsColors','p_id');
    }
    /**
     * 获取商品品牌。
     */
    public function brand()
    {
        return $this->hasOne('App\Entity\ProductBrand', 'id', 'brand_id');
    }

    /**
     * 获取商品相册图片集合。
     */
    public function images()
    {
        return $this->hasMany('App\Entity\ProductImages','p_id');
    }
    /*
     * 获取商品属性
     */
    public function attr()
    {
        return $this->hasMany('App\Entity\ProductAttributeValue', 'p_id');
    }

    /*
     * 获取商品属性
     */
    public function orderDetail()
    {
        return $this->hasMany('App\Entity\OrderDetail', 'p_id');
    }
}
