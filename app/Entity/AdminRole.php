<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
    protected $table = 'adminrole';

    public $fillable = ['group_id', 'role_desc', 'role_name', 'role', 'status'];
}
