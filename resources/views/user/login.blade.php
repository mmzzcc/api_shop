@extends('layouts.index')
@section('content')

	
	<!-- login -->
	<div class="pages section">
		<div class="container">
			<div class="pages-head">
				<h3>登录</h3>
			</div>
			<div class="login">
				<div class="row">

					<form class="col s12" action="/index/user/login" method="get">
						<div class="input-field">
							<input type="text" class="validate" placeholder="请输入用户名" required id="user_name" name="user_name">
						</div>
						<div class="input-field">
							<input type="password" class="validate" placeholder="请输入密码" requiredid ="pwd" name="pwd">
						</div>
						<a href=""><h6>Forgot Password ?</h6></a>
						{{--<a href="" class="btn button-default">LOGIN</a>--}}
                        <button id='log' class="btn button-default">登录</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end login -->
<script>
    $(function(){
        //点击登录
        $('#log').click(function(){
            var user_name=$('#user_name').val();//账号
            var pwd=$('#pwd').val();//密码

            //前段非空验证
            if(user_name==''||pwd==''){
                alert('请填写完整的信息');
                return false;
            }

        })





    })






















</script>

@endsection


