<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class MemberDetail extends Model
{
    protected $table = 'memberdetail';

    protected $primaryKey = 'mid';

    public $fillable = ['sex', 'birthday', 'avator'];
}
