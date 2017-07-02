<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Flc\Alidayu\Client;
use Flc\Alidayu\App;
use Flc\Alidayu\Requests\AlibabaAliqinFcSmsNumSend;
use Session;
use App\Entity\Member;
class SmsController extends Controller
{


    public function sms(Request $request)
    {
        $data = $request->all();
        $config = [
            'app_key'    => config('alisms.KEY'),
            'app_secret' => config('alisms.SECRETKEY'),
        ];

        $client = new Client(new App($config));
        $req    = new AlibabaAliqinFcSmsNumSend;
        $rand  = rand(1000,9999);
        $req->setRecNum($data['phone'])
            ->setSmsParam([
                'code' => $rand
            ])
            ->setSmsFreeSignName('九九八十一')
            ->setSmsTemplateCode('SMS_74525040');

        $request->session()->put('sms_code',$rand);

        //执行发送短信
        if($client->execute($req)){
            return json_encode(['ResultData' => '0', 'info' => "发送成功"]);
        }else{
            return json_encode(['ResultData' => '1', 'info' => '重复发送']);
        }
    }

    public function smsCode(Request $request, $uid, $code)
    {
//        dump($uid);
        $str = $uid.'123456';
//        dd(md5($str));
////        dd($code);
        if($code == md5($str)){
           Member::find($uid)->update(['status'=>0]);

           return redirect('/');
        };


    }

}
