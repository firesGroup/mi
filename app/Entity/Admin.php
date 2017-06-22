<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';

    public $fillable = ['gid', 'username', 'password', 'status', 'add_time', 'last_time', 'last_ip'];
}
