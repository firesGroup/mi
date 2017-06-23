<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';

    protected $fillable = [
       'nick_name','password','email','phone','status','last_ip','remember_token','created_at','updated_at'
];


}
