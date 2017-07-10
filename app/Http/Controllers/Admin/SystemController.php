<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Home\BaseController;
use App\Http\Requests\Admin\SystemRequest;

class SystemController extends BaseController
{
    /**
     *
     * 基本信息设置页模板
     *
     */
    public function getWeb()
    {
        //获取配置
        $web = $this->config['web'];
        return view('admin.system.web',compact('web'));
    }

    /**
     *
     * 处理基本信息设置
     *
     * @param SystemRequest $request
     *
     * @return bool 0成功 1失败
     */
    public function setWeb(SystemRequest $request)
    {
        $web = $request->except(['_token','web_logo','file']);
        //如果填写远程图片 下载到本地
        $web['web_logo'] = getUrlImages($request->web_logo,'system');
        //写入配置文件
        $res = $this->set('web',$web);
        return  $res;
    }

    public function getSeo()
    {
        //获取配置
        $seo = $this->config['seo'];
        return view('admin.system.seo',compact('seo'));
    }

    /**
     *
     * 处理seo设置
     *
     * @param SystemRequest $request
     *
     * @return bool 0成功 1失败
     */
    public function setSeo(SystemRequest $request)
    {
        //获取配置
        $seo = $request->except(['_token']);
        //处理替换变量
        $newSeo = $this->match($seo);
        //写入
        $res = $this->set('seo',$newSeo);
        return $res;
    }

    /*
     * 设置写入处理
     * @param  写入配置选择  可选值:  web  web信息配置
     *                             seo  seo信息配置
     *
     */
    protected function set($check,$config)
    {
        //获取所有配置
        $system= $this->config;
        //赋值单组配置区
        $system[$check]=$config;
        //写入
        return $this->setConfig($system);
    }

    /*
     * 写入配置项
     * @param $config array 配置内容数据数组
     *
     */
    protected function setConfig($config)
    {
        if( is_array($config) ){
            ob_start();
            var_export($config);
            $arrStr = ob_get_contents();
            ob_end_clean();
            $str = '<?php'.PHP_EOL.'return '.$arrStr.";";
            $res = file_put_contents(config_path('system.php'),$str);
            return $res?0:1;
        }else{
            return 1;
        }
    }

    protected function match(array $arr)
    {
       $config = $this->config;
        //被替换变量字符
        $oldStrArr = [
            '{web_domain}',
            '{web_name}',
            '{web_title}',
            '{web_key}',
            '{web_desc}',
        ];
        //替换字符
        $newStrArr = [
            $config['web']['web_domain'],
            $config['web']['web_name'],
            $config['web']['web_title'],
            $config['web']['web_keys'],
            $config['web']['web_desc'],
        ];
        foreach( $arr as $k=>$v ){
            $res = str_replace($oldStrArr, $newStrArr, $v);
            $newArr[$k] = $res;
        }
        return $newArr;
    }
}