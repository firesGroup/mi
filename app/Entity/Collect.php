<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Collect extends Model
{
    protected $table = 'collect';

    protected $fillable = [ 'member_id', 'p_id'];
}
