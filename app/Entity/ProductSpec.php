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
    protected $table = 'product_spec';
    //指定关联数据库表主键
    protected $primaryKey = 'id';

    protected $fillable = [
        'spec_name','model_id','spec_item'
    ];

    /*
     * 关联所属模型信息
     *
     */
    public function model()
    {
        $this->belongsTo('App\Entity\ProductModel','model_id');
    }

    /*
     * 关联规格项
     *
     */
    public function item()
    {
        return $this->hasMany('App\Entity\ProductSpecItem','spec_id');
    }
}
