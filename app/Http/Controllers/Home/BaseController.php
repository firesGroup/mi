<?php

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Home\HomeController as HomeC;
use Session;
use DB;

class BaseController extends Controller
{

    public function __construct()
    {
        $header_nav = HomeC::headerNav();

//        ;
        view()->share([

            'header_nav' => $header_nav,

        ]);
    }
}