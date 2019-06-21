@extends('layouts.index')
@section('content')

	<!-- product -->
	<div class="section product product-list">
		<div class="container">
			<div class="pages-head">
				<h3>PRODUCT LIST</h3>
			</div>
			<div class="input-field">
				<select id='order_field'>
					<option value="shop_price">价格</option>
					<option value="market_price">积分</option>
				</select>
			</div>
			<div id="goodsInfo">
				<div class="row margin-bottom">
					@foreach($goodsInfo as $v)
					<div class="col s6">
						<div class="content">
							<img src="/uploads/{{$v['goods_img']}}" goods_id="{{$v['goods_id']}}" style="cursor:pointer;" class="goods_img" alt="">
							<h6><a href="detail?goods_id={{$v['goods_id']}}">{{$v['goods_name']}}</a></h6>
							<div class="price">
								${{$v['shop_price']}}
							</div>
							<a href="/index/cart/cartList?goods_id={{$v['goods_id']}}" class="btn button-default">添加到购物车</a>
						</div>
					</div>
					@endforeach
				</div>
				<div class="pagination-product">
					<ul>
						{{$goodsInfo->appends($query)->links()}}
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- end product -->

	<script type="text/javascript">
		$(function(){
			layui.use(['layer'],function(){
				var layer=layui.layer;
				//点击图片进入详情页
				$('.goods_img').click(function(){
					var goods_id=$(this).attr('goods_id');
					location.href='detail?goods_id='+goods_id;
				});
				//点击下拉框排序商品
				$('#order_field').change(function(){
					var order_field=$(this).val();
					$.get(
						'goodsInfo',
						{order_field:order_field},
						function(res){
							$('#goodsInfo').html(res);
						}
					)
				});
			});
		});
	</script>

	
@endsection