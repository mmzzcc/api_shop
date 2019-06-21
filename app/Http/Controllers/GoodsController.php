<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
<<<<<<< HEAD
=======
use App\Model\AddressModel;
use App\Model\CartModel;
>>>>>>> fcd8a51231601fc0b1db25920c15470a0bafe790
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
    	$user_id=session('user_id');
    	$cart_id=request()->input('cart_id');
    	// $cart_id=explode(',', $cart_id);
    	//TODA  业务逻辑
    	//通过购物车穿过的购物车id 与商品id 查询该用户买的商品数量和单价 总价 赋值给模板展示
    	$where=[
    		'user_id'=>$user_id,
    		'cart_id'=>$cart_id
    	];
    	$cart_data=CartModel::where($where)->first()->toArray();
    	$goods_id=$cart_data['goods_id'];
    	$buy_number=$cart_data['buy_number'];
    	//查出商品id 和 购买数量后 通过商品id 查询单价 通过购买数量*单价计算总价 赋值 给前台用户
    	$goods_where=[
    		'goods_id'=>$goods_id
    	];
    	$goods_data=GoodsModel::where($goods_where)->first()->toArray();
    	//查出数据计算总价
    	$count=0;
    	$count=$goods_data['shop_price']*$buy_number;
    	$goods_data['count']=$count;
    	$goods_data['buy_number']=$buy_number;;
    	return view('goods/checkout',compact('goods_data'));
    	// return view('goods/checkout');

    }
    /**
     * [处理结算订单]
     * @return [type] [description]
     */
    public  function doCheckout(){
    	//用户id通过session获取或者通过封装函数获取
    	$user_id=session('user_id');

    	$data=Request()->all();
    	// dd($data);
    	//入库收货人信息
    	$data=[
		  "address_name" => $data['address_name'],
		  "address_email" =>  $data['address_email'],
		  "address_detail" =>  $data['address_detail'],
		  "address_country" =>  $data['address_country'],
		  "address_mail" =>  $data['address_mail'],
		  "address_tel" =>  $data['address_tel'],
		  "pay_type" =>  $data['pay_type'],
		  // "order_id" => $data['order_id'],
		  "user_id" => $user_id,
		  "create_time" => time()
		];
    	$res=AddressModel::insert($data);
    	if ($res) {
    		//生成订单号 存用户id 把支付的商品名称总价存入库
    		$this->abort('已生成订单,请支付','pay');
    	}else{
    		$this->abort('糟糕网络出了点问题,请重试','checkout');

    	}
    }
    //内部方法
	public function abort($msg,$url){
		echo "<script>alert('{$msg}');location.href='{$url}'</script>";
	}

	 /**
     * [支付]
     * @return [type] [description]
     */
	public function pay(){
		echo "使用支付宝支付";die;
		$appId="2016092700605424";
		$ali_gatewat="https://openapi.alipaydev.com/gateway.do";
		//请求参数
		$biz_content=[
			'subject'=>'商品昵称',
			'out_trade_no'=>'2019'.mt_rand(11111,99999),
			'total_amount'=>'50',
			'product_code'=>'QUICK_WAP_WAY'
		];
		$data=[
			'app_id'=>$appId,
			'method'=>'alipay.trade.wap.pay',
			'charset'=>'utf-8',
			'sign_type'=>'RSA2',
			'timestamp'=>date('Y-m-d H:i:s'),
			'version'=>'1.0',
			'biz_content'=>$biz_content
		];
		//签名
		openssl_sign($data, $signature, openssl_get_privatekey("file://".storage_path('keys/pre.pem')));
		$sign=base64_encode($signature);
		$data['sign']=$sign;
		//发送数据
		$client=new Client;
		$response=$client->request('POST',$ali_gatewat,[
			'form_params'=>$data
		]);
		echo $response->getBody();
	}
}
