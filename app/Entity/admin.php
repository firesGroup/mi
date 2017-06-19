<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $table = 'admin';

    public $fillable = ['gid', 'username', 'password', 'status'];
}
