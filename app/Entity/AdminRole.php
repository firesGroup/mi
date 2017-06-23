<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class adminRole extends Model
{
    protected $table = 'admin_role';

    public $fillable = ['group_id', 'role_desc', 'role_name', 'role', 'status'];
}
