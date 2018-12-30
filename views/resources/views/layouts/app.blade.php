<!DOCTYPE html>
<html>
<head>
	<title>Meu titulo - @yield('titulo')</title>
</head>
<body>
	@section('barralateral')
		<p>Esta parte da seção é do template pai</p>
	@show
	<div>
		@yield('conteudo')
	</div>
</body>
</html>