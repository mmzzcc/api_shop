<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function abort($msg,$url)
    {
    	echo "<script>alert('{$msg}');location.href='{$url}';</script>";
    	return;
    }

    public function ok($font='操作成功',$code=1,$skin=6)
    {
    	echo json_encode(['font'=>$font,'code'=>$code,'skin'=>$skin]);
    	return;
    }

    public function no($font='操作失败',$code=2,$skin=5)
    {
    	echo json_encode(['font'=>$font,'code'=>$code,'skin'=>$skin]);
    	return;
    }
}
