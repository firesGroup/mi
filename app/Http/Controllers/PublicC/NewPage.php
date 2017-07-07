<?php
/**
 * File Name: NewPage.php
 * Description: 生成分页HTML重定义
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/19
 * Time: 16:48
 */

namespace App\Http\Controllers\PublicC;

use Illuminate\Pagination\BootstrapThreePresenter as Boot;
use Illuminate\Support\HtmlString;

class NewPage extends Boot
{
    //生成分页html
    public function render()
    {
        if ($this->hasPages())
        {
            return  new HtmlString(sprintf(
                '<div style="text-align:center"><div class="xm-pagenavi layui-box layui-laypage layui-laypage-default ">%s %s %s</div></div>',
                //上一页按钮
                $this->getPreviousButton('上一页'),
                //分页
                $this->getLinks(),
                //下一页按钮
                $this->getNextButton('下一页')
            ));
        }

        return '';
    }

    //定义单个连接html
    protected function getAvailablePageWrapper($url, $page, $rel = null)
    {
        $rel = is_null($rel) ? '' : ' rel="'.$rel.'"';
        //返回html代码
        return '<a class="numbers" href="'.htmlentities($url).'" data-page="'.$page.'">'.$page.'</a>';
    }

    //定义禁用显示页html
    protected function getDisabledTextWrapper($text)
    {
//        dump( $this->paginator->nextPageUrl() );
        //不写
    }

    //定义当前显示页html
    protected function getActivePageWrapper($text)
    {
        return '<span class="layui-laypage-curr numbers current"><em class="layui-laypage-em"></em><em>'.$text.'</em></span>';
    }

}
