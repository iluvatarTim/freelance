
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../../favicon.ico">

	<title>Dashboard</title>

	<!-- Bootstrap core CSS -->

	{!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css') !!}
	{!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css') !!}
	{!! Html::style('css/bootstrap-responsive.min.css') !!}

	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    {{ Html::style('css/ie10-viewport-bug-workaround.css') }}

	<!-- Custom styles for this template -->
    {{ Html::style('css/dashboard.css') }}

	<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
	<!--[if lt IE 9]>{{ Html::script('js/ie8-responsive-file-warning.js') }}<![endif]-->
    {{ Html::script('js/ie-emulation-modes-warning.js') }}

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
    {{ Html::script('https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') }}
    {{ Html::script('https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}
	<![endif]-->
</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                {{ Html::link('', 'Freelance Platform', ['class' => 'navbar-brand']) }}
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>{{ Html::link('admin', 'Tableau de bord') }}</li>
                    <li>{{ Html::link('admin/users', 'Liste des utilisateurs') }}</li>
                    <li>{{ Html::link('admin/project', 'Liste des projest') }}</li>
                    <li>{{ Html::link('admin/test', 'Liste des Tests') }}</li>
                    <li>{{ Html::link('admin/conv', 'Messages') }}</li>
                    <li>{{ Html::link('logout', 'Logout') }}</li>
                </ul>
            </div>
        </div>
    </nav>
    @if(session()->has('success'))
        <div class="alert alert-success">{!! session('success') !!}</div>
    @elseif(session()->has('error'))
        <div class="alert alert-error">{!! session('error') !!}</div>
    @endif
	<div class="container">
		@yield('content')
	</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
{{ Html::script('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js') }}
<script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
{{ Html::script('js/bootstrap.min.js') }}
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
{{ Html::script('js/ie10-viewport-bug-workaround.js') }}
</body>
</html>
