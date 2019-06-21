@extends('layouts.index')
@section('content')
	
	<!-- cart -->
	<div class="cart section">
		<div class="container">
			<div class="pages-head">
				<h3>CART</h3>
			</div>
			<div class="content">
                <input type="hidden" value="{{$cart_id}}" id="cart_id">
				@foreach($data as $k=>$v)
				<div class="cart-1">
					<div class="row">
						<div class="col s5">
							<h5>Image</h5>
						</div>
						<div class="col s7">
							<img src="/uploads/{{$v['image']}}" alt="" style="width:150px;height:150px">
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>Name</h5>
						</div>
						<div class="col s7">
							<h5><a href="">{{$v['name']}}</a></h5>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>Quantity</h5>
						</div>
						<div class="col s7">
                            <input type="hidden" value="{{$v['cart_id']}}">
							<input value="{{$v['buy_number']}}" type="text" id="num">
                            <input type="hidden" value="{{$v['goods_num']}}">
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>Price</h5>
						</div>
						<div class="col s7">
							<h5>${{$v['price']}}</h5>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>Action</h5>
						</div>
						<div class="col s7">
							<h5><i class="fa fa-trash"></i></h5>
						</div>
					</div>
				</div>
				<div class="divider"></div>
				@endforeach
			</div>
			<div class="total">
				@foreach($data as $v)
				<div class="row">
					<div class="col s7">
						<h5>{{$v['name']}}</h5>
					</div>
					<div class="col s5">
						<h5>${{$v['price']*$v['buy_number']}}</h5>
					</div>
				</div>
				@endforeach
				<div class="row">
					<div class="col s7">
						<h6>Total</h6>
					</div>
					<div class="col s5">
						<h6 id="totalPrice">${{$totalPrice}}</h6>
					</div>
				</div>
			</div>
			<button class="btn button-default">Process to Checkout</button>
		</div>
	</div>
	<!-- end cart -->

	<!-- loader -->
	<div id="fakeLoader"></div>
	<!-- end loader -->

    <script type="text/javascript">
        $(function(){
            $(document).on('change','#num',function(){
                var buy_num=$(this).val();
                var goods_num=parseInt($(this).next('input').val());
                var reg=/^\d{1,}$/;
                var new_num='';
                if(buy_num=='' || buy_num<1 || !reg.test(buy_num)){
                    new_num=1;
                }else if(buy_num>=goods_num){
                    new_num=goods_num;
                }else{
                    new_num=buy_num;
                }
                $(this).val(new_num);
                var cart_id=$(this).prev('input').val();
                $.post(
                    '/index/cart/buyNum',
                    {cart_id:cart_id,new_num:new_num},
                    function(res){
                        $('#totalPrice').text('$'+res);
                    },
                    'json'
                )
            })
            $(document).on('click','.btn button-default',function(){
                var cart_id=$('#cart_id').val();
                $.get(
                    '/index/goods/checkout',
                    {cart_id:cart_id},
                    function(res){

                    },
                    'json'
                )
            })
        })
    </script>
@endsection