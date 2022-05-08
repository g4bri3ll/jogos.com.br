@extends('layout')
@section('template')

<div class="form-signin">
  <h4 class="form-signin-heading">Sistema loteria</h4>
  <h4 class="form-signin-heading">RECUPERAR SENHA</h4>
  <hr>
  @if(!empty($false))
  <div class="alert alert-error">
    <a class="close" data-dismiss="alert" href="#">&times;</a>
    <h4 class="alert-heading">Error!</h4>
    {{$false}}
  </div>
  @endif
  <p>Digite seu e-mail para recuperar a senha de acesso:</p>

  <form action="{{ url('recuperaSenha')}}" method="POST">
    {{ csrf_field() }}
    <input type="email" class="input-block-level" placeholder="E-mail" name="email" />
    <input type="submit" class="btn btn-large btn-block btn-primary" value="RECUPERAR SENHA" />
  </form>
  <hr>
  <a href="{{ route('logar')}}">Voltar</a>
</div>

@endsection
