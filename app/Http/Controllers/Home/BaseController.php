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
        //头部横排导航 商品
        $header_nav = HomeC::headerNav();
        //头部纵向导航 商品
        $header_nav_port = HomeC::headerNavPort();

        view()->share([
            'header_nav'=>$header_nav,
            'header_nav_port'=>$header_nav_port,
        ]);
    }
}
