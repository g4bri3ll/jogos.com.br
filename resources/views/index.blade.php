@extends('layout')
@section('template')

<div class="form-signin">

  <p style="font-size: 25px;"><b>ACESSANDO.</b>ME</p>

  <hr />
  @if(!empty($true))
  <div class="alert alert-success">
    <a class="close" data-dismiss="alert" href="#">&times;</a>
    <h4 class="alert-heading">Sucesso!</h4>
    {{$true}}
  </div>
  @endif
  <p>Escolha o produto a ser acessado:</p>
  
  <ul>
    <li><a href="{{ url('tres') }}">Lotofácil 3x3</a></li>
    <li><a href="{{ url('quatro') }}">Lotofácil Erre 4</a></li>
    <li><a href="{{ url('cinco') }}">Lotofácil Erre 5</a></li>
    <li><a href="{{ url('sete') }}">Lotofácil Erre 7</a></li>
    <li><a href="{{ url('rastreador') }}">Rasterador Tendências Lotofácil</a></li>
  </ul>

</div>

@endsection