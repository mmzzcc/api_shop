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