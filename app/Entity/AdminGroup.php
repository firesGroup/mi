<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class AdminGroup extends Model
{
    protected $table = 'admingroup';

    public $fillable = ['group_name', 'group_desc', 'role_list', 'status'];
}
