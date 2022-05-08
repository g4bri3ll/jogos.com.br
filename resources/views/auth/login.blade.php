@extends('../layout')
@section('template')

    <form method="POST" action="{{ route('login') }}">
        @csrf
        @if(!empty($false))
            <div class="alert alert-error">
                <a class="close" data-dismiss="alert" href="#">&times;</a>
                <h4 class="alert-heading">Error!</h4>
                {{$false}}
            </div>
        @endif
        @if(!empty($true))
            <div class="alert alert-success">
                <a class="close" data-dismiss="alert" href="#">&times;</a>
                <h4 class="alert-heading">Sucesso!</h4>
                {{$true}}
            </div>
        @endif

        <h4 class="form-signin-heading">Sistema loteria</h4>
        <input type="email" class="input-block-level" placeholder="Email" name="email" />
        <input type="password" class="input-block-level" placeholder="Senha" name="pwd" />
        <label class="checkbox">
            <input type="checkbox" value="remember-me"> Lembra senha
        </label>
        <button class="btn btn-large btn-block btn-primary" type="submit">ENTRAR</button>

        <div style="margin-top: 35px;">
            @if (Route::has('password.request'))
                <a class="btn btn-link" style="float: left;" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
            <a style="float: right;" href="{{ url('retornaCadastro') }}" />Faça seu cadastro?<a/>
        </div>
    </form>

@endsection
