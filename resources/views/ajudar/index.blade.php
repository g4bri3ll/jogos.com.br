@extends('layout')
@section('template')

<div class="container-fluid">
	<div class="row-fluid">
		<h2>Ajuda</h2>
		<p>Assista ao vídeo abaixo para entender o funcionamento do sistema.</p>
		
		<div class="block-content collapse in">
			<video width="320" height="240" controls>
				<source src="movie.mp4" type="video/mp4">
				<source src="movie.ogg" type="video/ogg">
			</video>
		</div>
		<a href="{{ url('tres')}}" class="btn btn-large btn-block btn-primary">Criar jogo</a>
	</div>
</div>

@endsection
