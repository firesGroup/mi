<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    protected $table = 'advert';

    public $fillable = ['advert_image', 'advert_url', 'ad_location', 'status' ,'ad_desc'];
}
