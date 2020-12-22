<?php

namespace App\Http\Controllers;

use App\Models\Models\Captcha;
use App\Models\Models\User;
use Gregwar\Captcha\PhraseBuilder;
use Illuminate\Http\Request;
use Gregwar\Captcha\CaptchaBuilder;

class LoginController extends Controller
{
    public function judgeLogin(Request $request)
    {
        $params = $request->post('params');
        $username = $params['username'];
        $password = $params['password'];
        $captcha = $params['captcha'];
        $msg = '用户不存在';
        $code = 0;
        $captCode = Captcha::query()->find(1);
        $user = User::query()->where('username','=',$username)->first();

        if (strtolower($captCode->code) !== strtolower($captcha)){
            $msg = '验证码错误';

            $captCode->code = '';
            $captCode->save();
            return response()->json(['msg'=>$msg,'code'=>$code,]);
        }
        if ($user != null || $user!=''){
            if ($user['password'] != $password)
            {
                $msg = '密码错误';
            }else{
                $msg = 'login success';
                $code = 200;
            }

        }
        $captCode->code = '';
        $captCode->save();
        return response()->json(['msg'=>$msg,'code'=>$code,'user'=>$user]);
    }

    public function captcha()
    {
        $phrase1 = new PhraseBuilder;
        $code = $phrase1->build(4);
        $builder = new CaptchaBuilder($code,$phrase1);
        $builder->build();
        $phrase = $builder->getPhrase();
        $capt = Captcha::query()->find(1);
        $capt->code = $phrase;
        $capt->save();

        return response($builder->output())->header('Content-Type','image/jpeg');


    }
}
