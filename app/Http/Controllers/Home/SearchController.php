<?php

namespace App\Http\Controllers\Home;

use App\Entity\CateGory;
use Illuminate\Http\Request;
use hightman\xunsearch\lib;
use App\Http\Requests;
use Illuminate\Support\HtmlString;
use App\Http\Controllers\Home\BaseController;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class SearchController extends BaseController
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
            //获取搜索关键字
            $keyword = $request->keyword?new HtmlString($request->keyword):'';
            $word = $word?new HtmlString($word):$keyword;
            //获取选择的分类id
            $cid = intval($request->cid);
            //获取排序
            if ( $cid ){
                $cate_name = CateGory::find($cid)->category_name;
            }
            $xs = new \XS(config_path('product.ini'));
            $search = $xs->search; // 获取 搜索对象
            $query = '';

            if( $word ){
                $where[] = $word;
            }
            if( $cid ){
                $where[] = "category_id:".$cid;
            }
            if( count($where)>1){
                $query = implode(' AND ', $where);
            }else{
                $query = $where[0];
            }

            $perPage = 20;//每页显示数量
            if ($request->has('page')) {
                $current_page = $request->input('page');
                $current_page = $current_page <= 0 ? 1 :$current_page;
            } else {
                $current_page = 1;
            }
            $search->setQuery($query)
                    ->setFuzzy()
                    ->setLimit($perPage,($current_page-1)*$perPage);// 设置搜索语句, 分页, 偏移量

            if( $request->has('sort') ){
                $sort = $request->sort;
                switch($sort){
                    case 'recommend':
                        $search->setSort('recommend',true);
                        break;
                    case 'new':
                        $search->setSort('id');
                        break;
                    case 'price_up':
                        $search->setSort('price', true);
                        break;
                    case 'price_down':
                        $search->setSort('price');
                        break;
                    default:
                        $search->setSort('recommend',true);
                        break;
                }
                if( $word ){
                    $search->addWeight($word);
                }
            }

            $item = $search->search(); // 执行搜索，将搜索结果文档保存在 $docs 数组中
            $count = $search->count(); // 获取搜索结果的匹配总数

            $paginator =new LengthAwarePaginator($item, $count, $perPage, $currentPage, [
                'path' => Paginator::resolveCurrentPath(),
                'pageName' => 'page',
            ]);

            $data = $paginator->toArray()['data'];
            $category = $this->getCategory();
            return view('home.search.index',compact('cid','totalPage','cate_name','word','data','count','category','paginator','sort'));

    }

    /*
     * 查询所有分类
     *
     */
    public function getCategory()
    {
        //先查询出所有
        $all = CateGory::all()->lists('id')->toArray();
        //在查询出所有的父类id
        $par = CateGory::all()->lists('parent_id')->toArray();
        //如果id在父类id数组中,那么该id移出数组, 剩下的都是能直接添加商品的子类的id
        foreach( $all as $k=>$v ){
            if( in_array( $v,$par ) ){
                unset($all[$k]);
            }else{
                $info[] = CateGory::where('id',$v)->get();
            }
        }
        return $info;
    }

    //递归查询指定分类的子类 可无限级
    public function getCategoryChild($category_id)
    {
        $ids = '';
        $arr = CateGory::where('parent_id',$category_id)->lists('id')->toArray();
        if( $arr ){
            foreach( $arr as $v ){
                if ( $ids == '' ){
                    $ids = $v;
                }else{
                    $ids .= ",".$v;
                }
                $re = $this->getCategoryChild($v);
                if( $re !== false ){
                    $ids .= ",".$re;
                }
            }
            return $ids;
        }else{
            return false;
        }

    }
}
