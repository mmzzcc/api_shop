@extends('layouts.index')

@section('content')
	
	<!-- shop single -->
	<div class="pages section">
		<div class="container">
			<div class="shop-single">
				<img src="/uploads/{{$goodsInfo['goods_img']}}" alt="">
				<h5>{{$goodsInfo['goods_name']}}</h5>
				<div class="price">${{$goodsInfo['shop_price']}}</div>
				<div>积分：{{$goodsInfo['market_price']}}</div>
				<a type="button" href="/index/cart/cartList?goods_id={{$goodsInfo['goods_id']}}"  class="btn button-default">添加到购物车</a>
			</div>
		</div>
	</div>
	<!-- end shop single -->

@endsection