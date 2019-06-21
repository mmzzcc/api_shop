<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
	/**
	 * [前台首页]
	 * @return [type] [description]
	 */
    public function index()
    {
    	return view('index/index');
    }
}
