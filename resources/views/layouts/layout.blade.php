<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Site name</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<link rel="stylesheet" media="all" href="../css/style.css">
	<link rel="stylesheet" media="all" href="../css/menu-style.css">
</head>
<body>
@section('header')
	<header id="header">
		<div class="container">
			<a href="/" id="logo" title="Site name">Site name</a>
			<div class="right-links">
				<ul>
					<li><a href="{{ route('cart') }}"><span class="ico-products"></span>Cart</a></li>
					@if(!Auth::check())
						<li><a href="{{ route('register') }}"><span class="ico-account"></span>Register</a></li>
						<li><a href="{{ route('login') }}"><span class="ico-signout"></span>Login</a></li>
					@endif
					@if(Auth::check())
						<li>
							<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							<span class="ico-signout"></span>Logout</a>
						</li>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					@endif
				</ul>
			</div>
		</div>
		<!-- / container -->
	</header>
	<!-- / header -->

	<nav>

		{!! $menu !!} <!-- Кеширование меню реализовано с помощью View composer -->

		<!-- / container -->
	</nav>
	<!-- / navigation -->
	<div class="image-header">
		<p>{{ ($title) }}</p>
	</div>
@show

@section('content')
@show

@section('footer')
	<footer id="footer">
		<div class="container">
			<div class="cols">
				<div class="col">
					<h3>Frequently Asked Questions</h3>
					<ul>
						<li><a href="#">Fusce eget dolor adipiscing </a></li>
						<li><a href="#">Posuere nisl eu venenatis gravida</a></li>
						<li><a href="#">Morbi dictum ligula mattis</a></li>
						<li><a href="#">Etiam diam vel dolor luctus dapibus</a></li>
						<li><a href="#">Vestibulum ultrices magna </a></li>
					</ul>
				</div>
				<div class="col media">
					<h3>Social media</h3>
					<ul class="social">
						<li><a href="#"><span class="ico ico-fb"></span>Facebook</a></li>
						<li><a href="#"><span class="ico ico-tw"></span>Twitter</a></li>
						<li><a href="#"><span class="ico ico-gp"></span>Google+</a></li>
						<li><a href="#"><span class="ico ico-pi"></span>Pinterest</a></li>
					</ul>
				</div>
				<div class="col contact">
					<h3>Contact us</h3>
					<p>Site Name.<br>54233 Site<br>Adress</p>
					<p><span class="ico ico-em"></span><a href="#">contact@gmail.com</a></p>
					<p><span class="ico ico-ph"></span>(123) 456 789 123</p>
				</div>
				<div class="col newsletter">
					<h3>Join our newsletter</h3>
					<p>Sed ut perspiciatis unde omnis iste natus sit voluptatem accusantium doloremque laudantium.</p>
					<form action="#">
						<input type="text" placeholder="Your email address...">
						<button type="submit"></button>
					</form>
				</div>
			</div>
			<p class="copy">Copyright 2019 Name Site. All rights reserved.</p>
		</div>
		<!-- / container -->
	</footer>
@show
	<!-- / footer -->


	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script>window.jQuery || document.write("<script src='../js/jquery-1.12.0.min.js'>\x3C/script>")</script>
	<script src="../js/plugins.js"></script>
	<script src="../js/main.js"></script>
	<script src="../js/megamenu.js"></script>
</body>
</html>
