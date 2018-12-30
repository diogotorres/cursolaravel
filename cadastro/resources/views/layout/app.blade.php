<!DOCTYPE html>
<html>
<head>
	<!-- Estilo -->
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
	<title>Cadastro de Produtos</title>
	<meta charset="utf-8" name="csrf-token" content="{{csrf_token()}}">
	<style type="text/css">
		body {
			padding: 20px;
		}
		.navbar {
			margin-bottom: 20px;
		}
	</style>
</head>
<body>
	<div class="container">
		@component('navbar', ["current" => $current])
		@endcomponent
		<main role="main">
			@hasSection('body')
				@yield('body')
			@endif
		</main>
	</div>
	<!-- Bootstrap -->
	<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
	@hasSection('javascript')
		@yield('javascript')
	@endif
</body>
</html>