<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//use iscms\Alisms\SendsmsPusher as Sms;
//use Illuminate\Support\Facades\Session;
use Flc\Alidayu\Client;
use Flc\Alidayu\App;
use Flc\Alidayu\Requests\AlibabaAliqinFcSmsNumSend;
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

        $req->setRecNum($data['phone'])
            ->setSmsParam([
                'code' => rand(1000,9999)
            ])
            ->setSmsFreeSignName('龙彪')
            ->setSmsTemplateCode('SMS_74525040');



        if($client->execute($req)){
            return json_encode(['ResultData' => '成功', 'info' => '已发送']);
        }else{
            return json_encode(['ResultData' => '失败', 'info' => '重复发送']);
        }
    }
}
