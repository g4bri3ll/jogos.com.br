@extends('layout')
@section('template')

<div class="container-fluid">
	<div class="row-fluid">
		<h2>Jogos salvos</h2>

    @if(!empty($sucess))
    <div class="alert alert-success">
      <button class="close" data-dismiss="alert">&times;</button>
      <strong>Jogo!</strong> Excluído com sucesso.
    </div>
    @endif

    <hr />

		<div class="">
      		@foreach($arrayJogos as $j)
      			<div style="width: 70%; float: left;"><a href="{{ url('listaJogoSalvo', $j->nome) }}">{{$j->nome}}</a></div>
          	<a href="{{ url('excluirJogoSalvo', $j->nome) }}" style="width: 10%; float: right;"><b>Excluir</b></a><br />
          	<hr />
        	@endforeach
		</div>
	</div>
</div>

@endsection
