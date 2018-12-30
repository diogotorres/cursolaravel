<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
	<!-- 
		ou
		<link rel="stylesheet" href="{{URL::to('css/app.css')}}">
	-->
	<title></title>
</head>
<body>

	@component('components.meucomponente', ['tipo' => 'primary'])
		<strong>Erro: </strong> Sua mensagem de erro.
		@slot('titulo')
			Erro fatal
		@endslot
	@endcomponent

	@component('components.meucomponente', ['tipo' => 'danger', 'titulo' => 'Erro fatal'])
		<strong>Erro: </strong> Sua mensagem de erro.
	@endcomponent

	<!-- customizado pelo arquivo AppServiceProvider -->
	@alerta (['tipo' => 'warning'])
		<strong>Erro: </strong> Sua mensagem de erro.
		@slot('titulo')
			Erro fatal
		@endslot
	@endalerta

	@alerta (['tipo' => 'success'])
		<strong>Erro: </strong> Sua mensagem de erro.
		@slot('titulo')
			Erro fatal
		@endslot
	@endalerta

	<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</body>
</html>