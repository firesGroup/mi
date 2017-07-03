<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class SlideShow extends Model
{
    protected $table = 'slide_show';

    public $fillable = ['images', 'url'];
}
