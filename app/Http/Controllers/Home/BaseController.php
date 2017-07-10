<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Home\HomeController as HomeC;
use App\Entity\Collect;
use Session;
use DB;
class BaseController extends Controller
{
    public $config;//全局配置

    public function __construct()
    {
        $this->config = $this->loadConfig();
        //头部横排导航 商品
        $header_nav = HomeC::headerNav();
        //头部纵向导航 商品
        $header_nav_port = HomeC::headerNavPort();
        //获取喜欢的商品
        if( session('user_deta') ){
            $member_id = session('user_deta')['id'];
            $collect = Collect::where('member_id',$member_id)->lists('p_id')->toArray();
        }else{
            $collect[] = 0;
        }
        view()->share([
            'header_nav'=>$header_nav,
            'header_nav_port'=>$header_nav_port,
            'C'=>$this->config,
            'collect'=>$collect,
        ]);
    }

    public function loadConfig()
    {
        $config=config('system');
        return $config;
    }
}
