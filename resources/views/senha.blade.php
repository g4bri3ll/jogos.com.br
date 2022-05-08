@extends('layout')
@section('template')

<div class="form-signin">
  <h4 class="form-signin-heading">Sistema loteria</h4>
  <h4 class="form-signin-heading">ALTERAR SENHA</h4>
  <hr>
  @if(!empty($false))
  <div class="alert alert-error">
    <a class="close" data-dismiss="alert" href="#">&times;</a>
    <h4 class="alert-heading">Error!</h4>
    {{$false}}
  </div>
  @endif
  <p>Digite uma nova senha para alterá-la:</p>

  <form action="{{ url('alteraSenha')}}" method="POST">
    {{ csrf_field() }}
    <input type="password" class="input-block-level" placeholder="Nova senha" name="pwdN" />
    <input type="password" class="input-block-level" placeholder="Confirmar nova senha" name="pwdC" />
    <input type="submit" class="btn btn-large btn-block btn-primary" value="ALTERAR SENHA" />
  </form>
  <hr>
  <a href="{{ route('pagina_inicial')}}">Voltar</a>
</div>

@endsection
