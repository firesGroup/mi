<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class CateGory extends Model
{
    protected $table = "category";

    protected $fillable = [ 'category_name', 'parent_id', 'parent_path', 'sort'];
}
