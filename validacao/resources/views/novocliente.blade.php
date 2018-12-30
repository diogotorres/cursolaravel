<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Cliente</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
	<meta charset="utf-8" name="csrf-token" content="{{csrf_token()}}">
	<style type="text/css">
		body {
			padding: 20px;
		}
	</style>
</head>
<body>
	<main role="main">
		<div class="row">
			<div class="container col-md-8 offset-md-2">
				<div class="card border">
					<div class="card-header">
						<div class="card-title">
							Cadastro de Clientes
						</div>
					</div>
					<div class="card-body">
						<form action="/cliente" method="POST">
							@csrf
							<div class="form-group">
								<label for="nome">Nome do Cliente</label>
								<input type="text" id="nome" name="nome" class="form-control {{$errors->has('nome') ? 'is-invalid' : ''}}" placeholder="Nome do Cliente">
								@if($errors->has('nome'))
									<div class="invalid-feedback">
										{{$errors->first('nome')}}
									</div>
								@endif
							</div>
							<div class="form-group">
								<label for="idade">Idade do Cliente</label>
								<input type="number" id="idade" name="idade" class="form-control" placeholder="Idade do Cliente">
							</div>
							<div class="form-group">
								<label for="endereco">Endereço do Cliente</label>
								<input type="text" id="endereco" name="endereco" class="form-control" placeholder="Endereço do Cliente">
							</div>
							<div class="form-group">
								<label for="email">E-mail do Cliente</label>
								<input type="text" id="email" name="email" class="form-control" placeholder="E-mail do Cliente">
							</div>
							<button type="submit" class="btn btn-primary btn-sm">Salvar</button>
							<button type="cancel" class="btn btn-primary btn-sm">Cancelar</button>
						</form>
					</div>
					@if($errors->any())
						<div class="card-footer">
							@foreach($errors->all() as $error)
								<div class="alert alert-danger" role="alert">
									{{$error}}
								</div>
							@endforeach
						</div>
					@endif
				</div>
			</div>
		</div>
	</main>
	<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</body>
</html>