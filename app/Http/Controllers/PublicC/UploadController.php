<?php

namespace App\Http\Controllers\PublicC;

use Illuminate\Http\Request;
use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    /*
     * 获取上传页模板
     */
    public function getUpload(Request $request, $path, $id, $url)
    {
        $url = strtr( $url, ['@'=>'/'] );
        return view('public.upload',compact('path', 'id', 'url'));
    }

    /*
     * 实现文件上传方法
     *
     * @return
     */
    public function postUpload(Request $request)
    {
        //获取表单提交的上传文件Input的属性name的值
        $inputName = $request->input('inputName')?$request->input('inputName'):'file';

        //定义文件存储路径
        $path = $request->input('path')?$request->input('path'):date('Ymd',time());
        //检查目录是否存在
        //若不存在则创建目录
        if( !file_exists( 'uploads/'.$path ) ) {
            mkdir('uploads/'.$path, 0755, true);
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
                $newPath = $path.'/'.date('Ymd',time()).'/'.$fileName;

                //移动文件
                $bool = Storage::disk('uploads')->put( $newPath, file_get_contents($realPath));

                if( $bool ){
                    $res['status'] = 0;
                    $res['src'] = '/uploads/'.$newPath;
                }else{
                    $res['status'] = 1;
                }
                return json_encode($res);
            }
        }else{
            return '{status: 2 }';
        }
    }
}
