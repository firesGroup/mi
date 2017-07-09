<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class AdminMenu extends Model
{
    //指定关联数据库表名
    protected $table = 'admin_menu';
    //指定关联数据库表主键
    protected $primaryKey = 'id';


    protected $fillable = [ 'menu_title','parent_id','parent_path','menu_role_id','menu_group_id','menu_icon','status'];

    public function groupM()
    {
        return $this->hasOne('App\Entity\AdminMenuGroup','id','menu_group_id');
    }

    public function roleM()
    {
        return $this->belongsTo('App\Entity\AdminRole','menu_role_id','id');
    }

    public function getParentPathAttribute($value)
    {
        return ucfirst($value);
    }

    public function getParentIdAttribute($value)
    {
        return ucfirst($value);
    }

    public function getMenuTitleAttribute($value)
    {
        return ucfirst($value);
    }


    public function getMenuIconAttribute($value)
    {
        return ucfirst($value);
    }
}
