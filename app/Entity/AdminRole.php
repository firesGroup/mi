<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
    protected $table = 'admin_role';

    public $fillable = ['role_desc', 'role_name', 'role', 'status'];

    public function menu()
    {
        return $this->hasOne('App\Entity\AdminMenu','menu_role_id','id');
    }

    public function getRoleAttribute($value)
    {
        return ucfirst($value);
    }
}
