<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';

    public $fillable = ['group_id', 'username', 'password', 'status', 'add_time', 'last_time', 'last_ip'];

    public function group()
    {
        return $this->hasOne('App\Entity\AdminGroup', 'group_id');
    }
}
