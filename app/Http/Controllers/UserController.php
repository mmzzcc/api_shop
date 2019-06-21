<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\UserModel;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 用户注册页面
     */
    public function register()
    {
    	return view('user/register');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 用户注册执行
     */
    public function index(Request $request){
         //echo 11;
        $request=$request->all();//接受form 表单穿过来的值
        //dd($request);
        $password=$request['password'];
       $data=[//数据
          'user_name'=>$request['account'],
           'user_password'=>$password,
           'user_email'=>$request['email'],
           'add_time'=>time(),
       ];
        $res=UserModel::insertGetId($data);
        if($res){
            $request=[
                'code'=>1,
                'font'=>'注册成功'
            ];
        }else{
            $request=[
                'code'=>2,
                'font'=>'注册失败'
            ];
        }
        echo  json_encode($request);


    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 登录页面
     */
    public function login(Request $request)
    {
        $request=$request->all();
        if(!empty($request)){
            $data=UserModel::where(['user_name'=>$request['user_name']])->first();//查用户名
            // dd($data);
            if(empty($data)){
                header("Refresh:2,url=/index/user/login");
                die("用户名或者密码有误");
            }elseif($data->user_password==$request['pwd']){
                //登录成功存储session
                header("Refresh:2,url=/index");
                session(['user_id'=>$data['user_id']]);
            }else{
                header("Refresh:2,url=/index/user/login");
                die("用户名或者密码有误");
            }

        }
    	return view('user/login');
    }

}
