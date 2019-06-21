<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use App\Model\GoodsModel;

class GoodsController extends CommonController
{
	/**
	 * [商品列表]
	 * @return [type] [description]
	 */
	public function list()
	{
		$pageSize=8; //每页显示条数
		$query=request()->all(); //获取参数
		$goodsInfo=GoodsModel::orderBy('goods_id','asc')->paginate($pageSize);
		return view('goods/list',compact('goodsInfo','query'));
	}

	/**
	 * [重新获取商品数据]
	 * @return [type] [description]
	 */
	public function goodsInfo()
	{
		$order_field=request('order_field')??'goods_id'; //排序字段
		$query=request()->all(); //获取参数
		$pageSize=8; //每页显示条数
		$goodsInfo=GoodsModel::orderBy($order_field,'desc')->paginate($pageSize);
		echo view('goods/goodsInfo',compact('goodsInfo','query'));
	}

	/**
	 * [商品详情]
	 * @return [type] [description]
	 */
    public function detail()
    {
    	$goods_id=request('goods_id');
    	$goodsInfo=GoodsModel::where('goods_id',$goods_id)->first();
    	if(empty($goodsInfo)){
    		$this->abort('商品信息异常,请重试','/index/goods/list');return;
    	}
    	$goodsInfo=$goodsInfo->toArray();
    	return view('goods/detail',compact('goodsInfo'));
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
