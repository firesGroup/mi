<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class FriendLink extends Model
{
    protected $table = 'friend_link';

    public $fillable = ['link_name', 'link_url', 'link_logo'];
}
