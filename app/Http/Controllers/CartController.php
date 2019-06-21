<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\CartModel;
use App\Model\GoodsModel;

class CartController extends Controller
{
    //添加购物车
    public function cartAdd(){
        $goods_id=$_GET['goods_id'];
        $user_id=session('user_id');
        $data=[
            'goods_id'=>$goods_id,
            'buy_number'=>1,
            'user_id'=>$user_id,
            'create_time'=>time()
        ];
        $res=CartModel::insert($data);
        if($res){
            echo '购物车添加成功';
            header("refresh:2,url=/index/cart/cartList");
        }else{
            echo '购物车添加失败';
        }
    }
	/**
	 * [购物车列表]
	 * @return [type] [description]
	 */
    public function cartList()
    {
        $data=CartModel::get()->toArray();
        $totalPrice=0;
        $cart_id='';
        foreach($data as $k=>$v){
            $goodsInfo=GoodsModel::where(['goods_id'=>$v['goods_id']])->first()->toArray();
            $data[$k]['image']=$goodsInfo['goods_img'];
            $data[$k]['name']=$goodsInfo['goods_name'];
            $data[$k]['price']=$goodsInfo['shop_price'];
            $data[$k]['goods_num']=$goodsInfo['goods_number'];
            $totalPrice+=$v['buy_number']*$goodsInfo['shop_price'];
            $cart_id.=$v['cart_id'].',';
        }
        $cart_id=rtrim($cart_id,',');
    	return view('cart/cart_list',compact('data','totalPrice','cart_id'));
    }
    //改变购买量
    public function buyNum(Request $request){
        $cart_id=$request->cart_id;
        $new_num=$request->new_num;
        CartModel::where(['cart_id'=>$cart_id])->update(['buy_number'=>$new_num]);
        $data=CartModel::get()->toArray();
        $totalPrice=0;
        foreach($data as $k=>$v){
            $goodsInfo=GoodsModel::where(['goods_id'=>$v['goods_id']])->first()->toArray();
            $totalPrice+=$v['buy_number']*$goodsInfo['shop_price'];
        }
        echo json_encode($totalPrice);
    }
}
