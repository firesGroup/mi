<?php
/**
 * File Name: functions.php
 * Description: 全局公共函数
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/26
 * Time: 11:27
 */


/**
 * 多个数组的笛卡尔积
 *
 * @param unknown_type $data
 */
function combineDika() {
    $data = func_get_args();
    $data = current($data);
    $cnt = count($data);
    $result = array();
    $arr1 = array_shift($data);
    foreach($arr1 as $key=>$item)
    {
        $result[] = array($item);
    }

    foreach($data as $key=>$item)
    {
        $result = combineArray($result,$item);
    }
    return $result;
}


/**
 * 两个数组的笛卡尔积
 * @param unknown_type $arr1
 * @param unknown_type $arr2
 */
function combineArray($arr1,$arr2) {
    $result = array();
    foreach ($arr1 as $item1)
    {
        foreach ($arr2 as $item2)
        {
            $temp = $item1;
            $temp[] = $item2;
            $result[] = $temp;
        }
    }
    return $result;
}

/*
 * 远程图片自动保存为本地图片
 *
 * @param $url  远程图片地址
 * @param $path  保存目录  相对于 public/uploads
 *
 */

function getUrlImages($url, $path)
{
    //解析远程地址
    $urlArr = parse_url($url);
    if (empty($urlArr['host']) || $urlArr['host'] == $_SERVER['HTTP_HOST']) {
        //如果不是远程地址或不是网址,就返回原连接
        return $url;
    }
    //存储目录(相对于 public/upload)
    $path = isset($path)?$path:'temp';
    //检查目录是否存在
    //若不存在则创建目录
    if( !file_exists( 'uploads/'.$path ) ) {
        mkdir('uploads/'.$path, 0755, true);
    }
    //生成文件名
    $fileName = md5(date('YmdHis').rand(000000,9999999)).'.jpeg';//设置jpeg对于 gif和png没有任何影响

    //组成完成文件路径
    $filePath = $path.'/'.date('Ymd',time()).'/'.$fileName;

    //去除URL连接上面可能的引号
    $url = preg_replace( '/(?:^[\'"]+|[\'"\/]+$)/', '', $url );
    //初始化curl
    $hander = curl_init( );
    //设置要获取的图片的url
    curl_setopt($hander,CURLOPT_URL,$url);
    // 设置header
    curl_setopt($hander,CURLOPT_HEADER,0);
    // 设置cURL 参数，
    curl_setopt($hander,CURLOPT_FOLLOWLOCATION,1);
    //以数据流的方式返回数据,当为false 时是直接显示出来
    curl_setopt($hander,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($hander,CURLOPT_CONNECTTIMEOUT,3);
    //设置超时
    curl_setopt($hander,CURLOPT_TIMEOUT,60);
    // 运行cURL，请求网页
    $file = curl_exec($hander);
    // 关闭URL请求
    curl_close($hander);
    //将文件写入获得的数据
    $result = \Illuminate\Support\Facades\Storage::disk('uploads')->put($filePath,$file);
    if( !$result ){
        return false;
    }
    return '/uploads/'.$filePath;
}

/*
 * 根据尺寸自动生成对应图片地址
 * @param $img 图片地址
 * @param $width 需要的宽度
 * @param $height 需要的高度
 * return 返回处理过的图片地址
 */

function make_img_url($img, $width = 200, $height = 200) {
    $img_info = parse_url($img);
    /* 外部链接直接返回图片地址 */
    if (!empty($img_info['host']) && $img_info['host'] != $_SERVER['HTTP_HOST']) {
        return $img;
    } else {
        $pos = strrpos($img, '.');
        $img = substr($img, 0, $pos) . '_' . $width . '_' . $height . substr($img, $pos);
        return $img;
    }
}

/*
 * 直接返回图片标签字符串
 *
 *
 * @param $img 图片地址
 * @param $width 需要的宽度
 * @param $height 需要的高度
 * return 返回处理过的图片地址
 *
 *
 */
function img($img,$width,$height){
    $img_info = parse_url($img);
    /* 外部链接直接返回图片地址 */
    if (!empty($img_info['host']) && $img_info['host'] != $_SERVER['HTTP_HOST']) {
        return $img;
    } else {
        $pos = strrpos($img, '.');
        $img = substr($img, 0, $pos) . '_' . $width . '_' . $height . substr($img, $pos);
        echo '<img src="'.$img.'" width="'.$width.'" height="'.$height.'" />';
        return ;
    }
}
