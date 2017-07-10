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
use Mail;
use App\Entity\Member;
class SmsController extends Controller
{


    public function sms(Request $request)
    {
        $data = $request->all();
//        dd($data);
        $this->validate($request, [
            'phone' => 'phone|string|required|unique:member,phone,',
        ],[
            'phone.phone' => '请输入正确输入的电话号码',
            'phone.unique' => '手机号已存在',
        ]);
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

    public function smsCode(Request $request)
    {
        $data = $request->all();
        $rand = rand(10000,99999);
        $request->session()->put('email_code',$rand);

        $to = $data['email'];

       $arr = Mail::raw('你好, 本次的验证码为'.$rand, function ($message) use ($to) {
            $message ->to($to)->subject('纯文本信息邮件验证码');

        });

        return 1;
    }

}
