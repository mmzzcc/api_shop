<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
	/**
	 * [购物车列表]
	 * @return [type] [description]
	 */
    public function cartList()
    {
    	return view('cart/cart_list');
    }
}
