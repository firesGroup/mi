<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class adminRole extends Model
{
    protected $table = 'adminrole';

    public $fillable = ['group_id', 'role_desc', 'role_name', 'role', 'status'];
}
