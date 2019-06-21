<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
//商城前台
Route::prefix('/index')->group(function(){
	//注册
	Route::get('user/register','UserController@register');
	//注册执行
	Route::post('user/register/index','UserController@index');
	//登录
	Route::get('user/login','UserController@login');
	//前台首页
	Route::get('/','IndexController@index');
	//购物车列表
	Route::get('cart/cartList','CartController@cartList');
	//商品详情
	Route::get('goods/detail','GoodsController@detail');
	//商品列表
	Route::get('goods/list','GoodsController@list');
	//商品结算
	Route::get('goods/checkout','GoodsController@checkout');
});
