<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class CateGory extends Model
{
    protected $table = "category";

    protected $fillable = [ 'category_name', 'parent_id', 'parent_path', 'status'];

    public function product()
    {
        return $this->hasMany('App\Entity\Product','category_id');
    }

    public function getCategoryNameAttribute($value)
    {
        return ucfirst($value);
    }
}
