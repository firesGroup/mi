<?php

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function __construct()
    {
        $header_nav = \App\Http\Controllers\Home\HomeController::headerNav();

        view()->share('header_nav',$header_nav);
    }
}