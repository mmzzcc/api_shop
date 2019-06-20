<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoodsController extends Controller
{
	/**
	 * [商品列表]
	 * @return [type] [description]
	 */
	public function list()
	{
		return view('goods/list');
	}

	/**
	 * [商品详情]
	 * @return [type] [description]
	 */
    public function detail()
    {
    	return view('goods/detail');
    }

    /**
     * [商品结算]
     * @return [type] [description]
     */
    public function checkout()
    {
    	return view('goods/checkout');
    }
}
