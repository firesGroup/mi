<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class adminGroup extends Model
{
    protected $table = 'admingroup';

    public $fillable = ['group_name', 'group_desc', 'role_list', 'status'];
}
