<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class ProductVersionsColors extends Model
{
    protected $table = 'product_versions_colors';

    protected $primaryKey = 'id';

    public $fillable = ['p_id', 'ver_id', 'color_id','color_name','color_img'];

}
