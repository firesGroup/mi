<?php
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Home\HomeController as HomeC;
use Session;
use DB;
<<<<<<< HEAD
=======

>>>>>>> 6d07e38230768a9a8bc7d67c79dcfd003abc8c28
class BaseController extends Controller
{
    public function __construct()
    {
        //头部横排导航 商品
        $header_nav = HomeC::headerNav();
        //头部纵向导航 商品
        $header_nav_port = HomeC::headerNavPort();
<<<<<<< HEAD
=======

>>>>>>> 6d07e38230768a9a8bc7d67c79dcfd003abc8c28
        view()->share([
            'header_nav'=>$header_nav,
            'header_nav_port'=>$header_nav_port,
        ]);
    }
}
