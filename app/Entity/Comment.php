<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';

    protected $fillable = [
        'id','member_id','p_id','content','type','comment_id'
    ];

    public function member()
    {
        return $this->belongsTo('App\Entity\Member','member_id');
    }

}
