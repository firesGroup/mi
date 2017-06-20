<?php

namespace App\Http\Controllers\PublicC;

use Illuminate\Http\Request;
use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    /*
     * 实现文件上传方法
     *
     * @return
     */
    public function upload(Request $request)
    {
        //获取表单提交的上传文件Input的属性name的值
        $inputName = $request->input('inputName')?$request->input('inputName'):'file';

        //定义文件存储路径
        $dir = $request->input('path')?$request->input('path'):date('Ymd',time());

        //检查目录是否存在
        //若不存在则创建目录
        if( !file_exists( $dir ) ) {
            mkdir($dir, 0755, true);
        }

        //判断是否为POST请求---文件上传必须为post
        if( $request->isMethod('post') ){
            //获取上传文件
            $file = $request->file($inputName);
            //判断文件是否上传成功
            if($file->isValid()){
                //获取上传文件相关信息

                // 获得文件原名
                $originalName = $file->getClientOriginalName();

                // 获得扩展名
                $ext = $file->getClientOriginalExtension();
                //获得临时文件的绝对路径
                $realPath = $file->getRealPath();
                //获取文件MIME类型
                $type = $file->getClientMimeType();

                //生成新文件名
                $fileName = md5(date('YmdHis').$originalName).'.'.$ext;

                //拼接文件存储路径
                $path = $dir.'/'.$fileName;

                //移动文件
                $bool = Storage::disk('uploads')->put( $path , file_get_contents($realPath));

                if( $bool ){
                    $res['status'] = 0;
                    $res['src'] = '/uploads/'.$path;
                }else{
                    $res['status'] = 1;
                }
                //获取成功后回调 控制器名称,方法名,参数
                $rtUri = $request->input('rtUri');
                $rtParams = $request->input('rtParams');


                return json_encode($res);
            }
        }else{
            return '{status: 2 }';
        }
    }
}
