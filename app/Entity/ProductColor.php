<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    //指定关联数据库表名
    protected $table = 'product_color';
    //指定关联数据库表主键
    protected $primaryKey = 'id';

    protected $fillable = [
        'color_name','color_img'
    ];

    public function getColorNameAttribute($value)
    {
        return ucfirst($value);
    }
    
    public function getColorImgAttribute($value)
    {
        return ucfirst($value);
    }
}
