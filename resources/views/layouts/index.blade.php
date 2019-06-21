<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="UTF-8">
	<title>Mstore - Online Shop Mobile Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1  maximum-scale=1 user-scalable=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-touch-fullscreen" content="yes">
	<meta name="HandheldFriendly" content="True">

	<link rel="stylesheet" href="{{asset('css/materialize.css')}}">
	<link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/normalize.css')}}">
	<link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
	<link rel="stylesheet" href="{{asset('css/owl.theme.css')}}">
	<link rel="stylesheet" href="{{asset('css/owl.transitions.css')}}">
	<link rel="stylesheet" href="{{asset('css/fakeLoader.css')}}">
	<link rel="stylesheet" href="{{asset('css/animate.css')}}">
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	
	<link rel="shortcut icon" href="{{asset('img/favicon.png')}}">

	<!-- scripts -->
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<script src="{{asset('js/materialize.min.js')}}"></script>
	<script src="{{asset('js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('js/fakeLoader.min.js')}}"></script>
	<script src="{{asset('js/animatedModal.min.js')}}"></script>
	<script src="{{asset('js/main.js')}}"></script>
	<!-- <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script> -->
	<script src="{{asset('layui/layui.js')}}"></script>

</head>
<body>
	@include('public.header')

	@include('public.menu')

	@include('public.cart_menu')

	@include('public.navbar')

	@yield('content')
	
	@include('public.footer')

</body>
</html>