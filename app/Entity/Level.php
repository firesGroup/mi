<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'level';

    public $fillable = ['level_name', 'consumption', 'discount', 'level_desc'];

    public function member()
    {
        return belongsTo('App\Entity\Member');
    }
}
