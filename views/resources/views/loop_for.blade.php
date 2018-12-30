@extends('layouts.meulayout')

@section('minha_secao_produtos')
	<h1>Loop FOR</h1>

	@for($i = 0; $i < $n; $i++)
		<p>Numero: {{$i}}</p>
	@endfor
@endsection