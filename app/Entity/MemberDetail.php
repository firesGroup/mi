<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class MemberDetail extends Model
{
    protected $table = 'member_detail';

    protected $primaryKey = 'member_id';

    public $fillable = ['member_id','sex', 'birthday', 'avator', 'level_id'];


}
