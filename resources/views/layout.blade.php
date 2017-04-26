<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">
	<meta name="description" content="Sublime Stunning free HTML5/CSS3 website template"/>

    {{ Html::style('css/reset.css') }}
    {{ Html::style('css/fancybox-thumbs.css') }}
    {{ Html::style('css/fancybox-buttons.css') }}
    {{ Html::style('css/fancybox.css') }}
    {{ Html::style('css/animate.css') }}
    {{ Html::style('css/main.css') }}
    {{ Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css') }}
	@yield('style')
</head>
<body>
	<section class="billboard light">
		<header class="wrapper light">
			<a href="{{URL::to('/')}}"><img class="logo" src="img/logo_light.png" alt=""/></a>
			<nav>
				<ul>
					<li class="active">{{ Html::link('/', 'Home')}}</li>
                    <li>{{ Html::link('forum', 'Forum') }}</li>
                    <li>{{ Html::link('project', 'Projets') }}</li>
					@if(\Illuminate\Support\Facades\Auth::check() == false)
                    	<li>{{ Html::link('login', 'Login') }}</li>
					@else
						<li>{{ Html::link('perso', 'Espace Personnel') }}</li>
						<li>{{ Html::link('logout', 'Logout') }}</li>
					@endif
				</ul>
			</nav>
		</header>

		<div class="caption light animated wow fadeInDown clearfix">
			<h1>Freelance Platform</h1>
			<p>Do it by yourself</p>
			<hr>
		</div>
		<div class="shadow"></div>
	</section><!--  End billboard  -->
	@if(session()->has('success'))
		<div class="alert alert-success">{!! session('success') !!}</div>
	@elseif(session()->has('error'))
		<div class="alert alert-error">{!! session('error') !!}</div>
	@endif
	@yield('content')

	<footer>
		<div class="wrapper">
			<div class="rights">
				<img src="img/footer_logo.png" alt="" class="footer_logo"/>
				<p> © <a href="#" target="_blank">Montias Timothée</a></p>
			</div>

			<nav>
				<ul>
					<li><a href="#">About</a></li>
					<li><a href="#">FAQ</a></li>
					<li><a href="#">Services</a></li>
					<li><a href="#">Blog</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
			</nav>
		</div>		
	</footer><!--  End footer  -->
   <!-- <script src='../ga.js'></script>-->
	<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/fancybox.js"></script>
    <script type="text/javascript" src="js/fancybox-buttons.js"></script>
    <script type="text/javascript" src="js/fancybox-media.js"></script>
    <script type="text/javascript" src="js/fancybox-thumbs.js"></script>
    <script type="text/javascript" src="js/wow.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>