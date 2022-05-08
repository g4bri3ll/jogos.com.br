@extends('layout')
@section('template')

<div class="container-fluid">
	<div class="row-fluid">
		<h2>Criar jogo</h2>

		<p><b>Passo 
			@if($impar_par == "par")
				1 
			@else 
				2
			@endif
		de 2.</b>Escolha <b>6 números 
			@if($impar_par == "par")
				pares
			@else 
				impares
			@endif
		</b> que devem ser incluídos em suas apostas: </p>
		
		@if(!empty($error))
		<div class="alert alert-error">
			<button class="close" data-dismiss="alert">&times;</button>
			<strong>Error!</strong> Não e possivel selecionar essa quantidade. Informe 6 numeros.
		</div>
		@endif

		<div class="block-content collapse in"> 
			@if($impar_par == "par")
				<form action="{{ route('salvaPar', [$par = 'par', $impar = '0', $codigo = 0]) }}" method="POST">
			@else
				<form action="{{ route('salvaPar', [$par = '0', $impar = 'impar', $codigo = $codigo]) }}" method="POST">
			@endif

				{{ csrf_field() }}
				<ul class="pager wizard">
					@if($impar_par == "par")
						@foreach($numeros as $num)
							@if($num->pares_impares == 2)
								<li>
									<a href="#">
										<input type="checkbox" name="valor[]" value="{{$num->id}}">
										<font color="black">{{$num->numero}}</font>
									</a>
								</li>
							@endif
						@endforeach
					@else
						@foreach($numeros as $num)
							@if($num->pares_impares == 1)
								<li>
									<a href="#">
										<input type="checkbox" name="valor[]" value="{{$num->id}}">
										<font color="black">{{$num->numero}}</font>
									</a>
								</li>
							@endif
						@endforeach
					@endif

				</ul>
				@if($impar_par == "par")
				<input type="submit" value="Prosseguir" class="btn btn-primary btn-large" />
				@else
				<input type="submit" value="Gerar apostas" class="btn btn-primary btn-large" 
				/>
				@endif
			</form>
		</div>
	</div>
</div>

@endsection
