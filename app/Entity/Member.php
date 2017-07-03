<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';

    protected $fillable = [
       'id','nick_name','password','email','phone','status','last_ip','remember_token'
    ];

    //关联会员等级

    public function spec ( ) {

        return $this->hasOne('App\Entity\Level','level_id');
    }

    public function comment()
    {
        return $this->hasMany('App\Entity\comment', 'member_id');
    }

}
