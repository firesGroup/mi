<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
    protected $table = 'admin_role';

    public $fillable = ['role_desc', 'role_name', 'role', 'status'];
}
