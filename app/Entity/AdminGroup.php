<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class AdminGroup extends Model
{
    protected $table = 'admin_group';

    public $fillable = ['group_name', 'group_desc', 'role_list', 'status'];
}
