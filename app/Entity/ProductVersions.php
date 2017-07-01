<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class ProductVersions extends Model
{
    protected $table = 'product_versions';

    protected $primaryKey = 'id';

    public $fillable = ['p_id', 'ver_id', 'ver_name', 'ver_spec', 'ver_desc', 'price', 'store','color_id','ver_img','status','contact_p_num'];

    public function getColorIdAttribute($value)
    {
        return ucfirst($value);
    }
    public function getVerImgAttribute($value)
    {
        return ucfirst($value);
    }
}
