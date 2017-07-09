<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class AdminMenuGroup extends Model
{
    //指定关联数据库表名
    protected $table = 'admin_menu_group';
    //指定关联数据库表主键
    protected $primaryKey = 'id';

    protected $fillable = [ 'menu_group_name'];

    public function menu()
    {
        return $this->hasMany('App\Entity\AdminMenu','id','menu_group_id');
    }

    public function getMenuGroupNameAttribute($value)
    {
        return ucfirst($value);
    }
}
