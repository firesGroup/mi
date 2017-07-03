<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class MemberDetail extends Model
{
    protected $table = 'member_detail';

    protected $primaryKey = 'member_id';

    public $fillable = ['sex', 'birthday', 'avator', 'level_id'];

    public function level () {
        $this->belongsTo('App\Entity\Level','level_id');
    }
}
