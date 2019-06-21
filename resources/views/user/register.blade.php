@extends('layouts.index')
@section('content')
	<!-- register -->
	<div class="pages section">
		<div class="container">
			<div class="pages-head">
				<h3>注册</h3>
			</div>
			<div class="register">
				<div class="row">
					{{--action="/index/user/register/index" method="get"--}}
					<form class="col s12" method="post">
						<div class="input-field">
							<input type="text" class="validate" placeholder="请输入用户名" id="account" name="account">
						</div>
						<div class="input-field">
							<input type="email" placeholder="请输入邮箱号" class="validate" required id="email" name="email">
						</div>
						<div class="input-field">
							<input type="password" placeholder="请输入密码" class="validate" required id="password" name="password">
						</div>
							<button id='reg' class="btn button-default">注册</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end register -->
<script>
	$(function(){
		//alert(111);
		//点击注册
		$('#reg').click(function(){
			var account=$('#account').val();//账号
			var password=$('#password').val();//密码
			var email=$('#email').val();//邮箱号
			// console.log(account);
			//前段非空验证
			if(account==''||password==''||email==''){
				alert('请填写完整的信息');
				return false;
			}
			//点击注册
			$.ajax({
				url : 'register/index',
				data:{account:account,password:password,email:email},
				type:'post',
				dataType:'json',
				success:function(res){
					//alert(1111);
					//console.log(res);
					if(res.code=='1'){
						alert(res.font);
						location.href='http://www.api_shop.com/index/user/login';
					}else{
						alert(res.font);

					}
				}
			})





		})





	})






















</script>


@endsection
