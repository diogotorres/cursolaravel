<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
	<title></title>
</head>
<body>
	@if(isset($produtos))
		@if(count($produtos) == 0)
			<h1>Nenhum produto</h1>
		@elseif(count($produtos) === 1)
			<h1>Um produto</h1>
		@else
			<h1>Temos vários produtos</h1>
			@foreach($produtos as $p)
				<p>Nome: {{$p}}</p>
			@endforeach
		@endif
	@else
		<h2>Variavel produtos nao foi passada como parametro</h2>
	@endif

	<!-- verifica se a variavel esta vazia -->
	@empty($produtos)
		<h2>Nada em produtos</h2>
	@endempty
	<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</body>
</html>