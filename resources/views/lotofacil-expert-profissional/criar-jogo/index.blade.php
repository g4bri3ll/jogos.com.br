@extends('layout')
@section('template')

<div class="container-fluid">
	<div class="row-fluid">
	<!-- block -->
		<h2>Criar jogo</h2>
		<p>Escolha <b>5 números</b> que devem ser<b> excluídos</b> de suas apostas: </p>
		
		<div class="row-fluid">
			@if(!empty($error))
			<div class="alert alert-error">
				<button class="close" data-dismiss="alert">&times;</button>
				<strong>Error!</strong> Não e possivel selecionar essa quantidade. Informe 5 numeros.
			</div>
			@endif
			<hr />
            <!-- block -->
            <div class="block-content collapse in">
                <div class="span6">
					<div class="block-content collapse in">
						<form action="{{ url('salvaJogoCinco') }}" method="POST">
						{{ csrf_field() }}
							<ul class="pager wizard">
								@foreach($numeros as $num)
									<li><a href="#">
										<input type="checkbox" name="valor[]" value="{{$num->id}}">
										<font color="black">{{$num->numero}}</font></a></li>
								@endforeach
							</ul>
							<input type="submit" value="Gerar apostas" class="btn btn-primary btn-large" />
						</form>
					</div>
                </div>
                <div class="span6">
                	<?php $i = 0; ?>
                	@if($i == '4')
					<table class="table table-striped">
		              <thead>
		                <tr>
		                  <th>Acerto</th>
		                  <th>Quantidade</th>
		                  <th>Prêmio (R$)</th>
		                </tr>
		              </thead>
		              <tbody>
		                <tr>
		                  <td>1</td>
		                  <td>2</td>
		                  <td>3</td>
		                </tr>
		              </tbody>
		            </table>
		            @else
		            <p style="padding-top: 25px; text-align: center;">Após a escolha dos 5 números, mostraremos uma simulação dos seus acertos com base no último concurso.</p>
		            @endif
                </div>
            </div>
            <hr />
            <h2>Resultado da Lotofácil</h2>
            <font >Concurso <b>{{$numeroConcurso}}</b> de {{date("d/m/Y", strtotime($dataSorteio))}}</font>
            <h1 style="color: blue;"> {{$resultado}} </h1>
            <p>{{$acumulou}}</p>

		</div>
	</div>
</div>

@endsection
