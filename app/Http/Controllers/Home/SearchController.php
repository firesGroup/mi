<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use hightman\xunsearch\lib;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{

    /*
     *
     * 搜索首页
     *
     * @param $word int 搜索关键字
     *        $category 分类id
     *
     */
    public function index(Request $request,$word=null)
    {
        if( empty($request->word) && empty($word) ){
            $this->list();
        }else{
            $xs = new \XS(config_path('product.ini'));
            $search = $xs->search; // 获取 搜索对象
            $query = $word;
            $search->setQuery($query)
                ->setSort('id', true)//按照id 正序排列
                ->setLimit(20, 0); // 设置搜索语句, 分页, 偏移量

            $docs = $search->search(); // 执行搜索，将搜索结果文档保存在 $docs 数组中
            $count = $search->count(); // 获取搜索结果的匹配总数

            return view('home.search.index');
        }
    }

    public function list()
    {
        echo 1;
    }
}
