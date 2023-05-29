@extends('layout')
@section('template')

<div class="form-signin">
  @if(!empty($false))
  <div class="alert alert-error">
    <a class="close" data-dismiss="alert" href="#">&times;</a>
    <h4 class="alert-heading">Error!</h4>
    {{$false}}
  </div>
  @endif
  @if(!empty($true))
  <div class="alert alert-error">
    <a class="close" data-dismiss="alert" href="#">&times;</a>
    <h4 class="alert-heading">Sucesso!</h4>
    {{$true}}
  </div>
  @endif

  <form method="POST" action="{{ url('cadastra') }}">
    {{ csrf_field() }}
    <h4 class="form-signin-heading">Cadastro de acesso</h4>
    <input type="text" class="input-block-level" placeholder="Email" name="email" />
    <input type="text" class="input-block-level" placeholder="Informe seu nome" name="nome" />
    <input type="password" class="input-block-level" placeholder="Senha" name="pwd" />
    <input type="password" class="input-block-level" placeholder="Confirme sua senha" name="Cpwd" />
    <button class="btn btn-large btn-block btn-primary" type="submit">SALVAR</button>
    <div style="margin-top: 35px;">
      <a href="{{ url('logar')}}">Retorna ao login?</a>
    </div>
  </form>
</div>

@endsection
