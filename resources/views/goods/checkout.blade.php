@extends('layouts.index')
@section('content')
	
	<!-- checkout -->
	<div class="checkout pages section">
		<div class="container">
			<div class="pages-head">
				<h3>结账</h3>
			</div>
			<div class="checkout-content">
				<div class="row">
					<div class="col s12">
						<ul class="collapsible" data-collapsible="accordion">
							<!-- 结算方式删除了 不登录不可以结算-->
							<li>
								<div class="collapsible-header"><h5>1 - 结算信息</h5></div>
								<div class="collapsible-body">
									<form action="doCheckout" method="post">
									<div class="billing-information">
										<!-- <form action="#"> -->
											<div class="input-field">
												<h5>收货人*</h5>
												<input type="text" name="address_name" class="validate" required>
											</div>
											<div class="input-field">
												<h5>电子邮箱*</h5>
												<input type="email" name="address_email" class="validate" required>
											</div>
											<div class="input-field">
												<h5>地址*</h5>
												<input type="text" name="address_detail" class="validate" required>
											</div>
											<div class="input-field">
												<h5>国家*</h5>
												<input type="text" name="address_country" class="validate" required>
											</div>
											<div class="input-field">
												<h5>邮编*</h5>
												<input type="number" name="address_mail" class="validate" required>
											</div>
											<div class="input-field">
												<h5>联系电话*</h5>
												<input type="number" name="address_tel" class="validate" required>
											</div>
										<!-- </form> -->
									</div>
								</div>
							</li>
							<!-- 运输信息删除了  内容于4中的超重复 -->
							<li>
								<div class="collapsible-header"><h5>2 - 付款方式</h5></div>
								<div class="collapsible-body">
									<div class="payment-mode">
										<p>请选择您的付款方式</p>
										<!-- <form action="#" class="checkout-radio"> -->
												<div class="input-field">
													<input type="radio" class="with-gap" id="bank-transfer" name="pay_type" value="1" required>
													<label for="bank-transfer"><span>银行卡支付</span></label>
												</div>
												<div class="input-field">
													<input type="radio" class="with-gap" id="cash-on-delivery" name="pay_type" value="2" required>
													<label for="cash-on-delivery"><span>付到付款</span></label>
												</div>
												<div class="input-field">
													<input type="radio" class="with-gap" id="online-payments" name="pay_type" value="3" required>
													<label for="online-payments"><span>支付宝在线支付</span></label>
												</div>
										<!-- </form> -->
									</div>
								</div>
							</li>
							<li>
								<div class="collapsible-header"><h5>3 - 订单审核</h5></div>
								<div class="collapsible-body">
									<div class="order-review">
										<div class="row">
											<div class="col s12">
												<div class="cart-details">
													<div class="col s5">
														<div class="cart-product">
															<h5>商品图</h5>
														</div>
													</div>
													<div class="col s7">
														<div class="cart-product">
															<img src="/uploads/{{$goods_data['goods_thumb']}}" alt="" width="50" height="50">
														</div>
													</div>
												</div>
												<div class="divider"></div>
												<div class="cart-details">
													<div class="col s5">
														<div class="cart-product">
															<h5>商品昵称</h5>
														</div>
													</div>
													<div class="col s7">
														<div class="cart-product">
															<a href="">{{$goods_data['goods_name']}}</a>
														</div>
													</div>
												</div>
												<div class="divider"></div>
												<div class="cart-details">
													<div class="col s5">
														<div class="cart-product">
															<h5>购买数量</h5>
														</div>
													</div>
													<div class="col s7">
														<div class="cart-product">
															<input type="text" value="{{$goods_data['buy_number']}}">
														</div>
													</div>
												</div>
												<div class="divider"></div>
												<!-- <div class="cart-details">
													<div class="col s5">
														<div class="cart-product">
															<h5>单价</h5>
														</div>
													</div>
													<div class="col s7">
														<div class="cart-product">
															<span>$2666.00</span>
														</div>
													</div>
												</div> -->
											<!-- 	<div class="cart-details">
													<div class="col s5">
														<div class="cart-product">
															<h5>总价</h5>
														</div>
													</div>
													<div class="col s7">
														<div class="cart-product">
															<span>$2666.00</span>
														</div>
													</div>
												</div> -->
											</div>
										</div>
									</div>
									<div class="order-review final-price">
										<div class="row">
											<div class="col s12">
												<div class="cart-details">
													<div class="col s8">
														<div class="cart-product">
															<h5>单价</h5>
														</div>
													</div>
													<div class="col s4">
														<div class="cart-product">
															<span>{{$goods_data['shop_price']}}</span>
														</div>
													</div>
												</div>
											<!-- 	<div class="cart-details">
													<div class="col s8">
														<div class="cart-product">
															<h5>Flat Shipping Rate:</h5>
														</div>
													</div>
													<div class="col s4">
														<div class="cart-product">
															<span>$5.00</span>
														</div>
													</div>
												</div> -->
												<div class="cart-details">
													<div class="col s8">
														<div class="cart-product">
															<h5>总计</h5>
														</div>
													</div>
													<div class="col s4">
														<div class="cart-product">
															<span>{{$goods_data['count']}}</span>
														</div>
													</div>
												</div>
											</div>
										</div>
										<button>提交</button>
										<!-- <a href="" class="btn button-default button-fullwidth">提交</a> -->
									</div>
								</div>
								</form>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end checkout -->
	<script type="text/javascript">
		$(function(){
			// alert(132);
		})
	</script>
@endsection