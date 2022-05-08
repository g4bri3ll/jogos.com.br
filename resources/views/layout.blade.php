<!DOCTYPE html>
<html>
  <head>
    <title>Sistema para loteria</title>
    <!-- Bootstrap -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{ asset('vendors/fullcalendar/fullcalendar.css')}}" rel="stylesheet" media="screen">
    <link href="{{ asset('assets/styles.css')}}" rel="stylesheet" media="screen">
    <script src="{{ asset('vendors/modernizr-2.6.2-respond-1.1.0.min.js')}}"></script>
    <link href="{{ asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{ asset('bootstrap/css/bootstrap-responsive.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{ asset('vendors/easypiechart/jquery.easy-pie-chart.css')}}" rel="stylesheet" media="screen">
    <script src="{{ asset('vendors/modernizr-2.6.2-respond-1.1.0.min.js')}}"></script>
  </head>
  <body id="login">

    <div class="container">
      <?php if (!empty($nav)) { ?>

      <div class="navbar">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">Admin Panel</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                          <li class="dropdown">
                            <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Meus Produtos <i class="fa fa-level-down"></i></a>
                            <ul class="dropdown-menu">
                              <li class="
                              @if(!empty($aT))
                              {{$aT}}
                              @endif
                              ">
                                <a tabindex="-1" href="{{ url('tres')}}">Lotofácil 3x3</a>
                              </li>
                              <li class="
                              @if(!empty($aQ))
                              {{$aQ}}
                              @endif
                              ">
                                <a tabindex="-1" href="{{ url('quatro') }}">Lotofácil Erre 4</a>
                              </li>
                              <li class="
                              @if(!empty($aC))
                              {{$aC}}
                              @endif
                              ">
                                <a tabindex="-1" href="{{ url('cinco') }}">Lotofácil Erre 5</a>
                              </li>
                              <li class="
                              @if(!empty($aS))
                              {{$aS}}
                              @endif
                              ">
                                <a tabindex="-1" href="{{ url('sete')}}">Lotofácil Erre 7</a>
                              </li>
                              <li class="
                              @if(!empty($aR))
                              {{$aR}}
                              @endif
                              ">
                                <a tabindex="-1" href="{{ url('rastreador/10')}}">Rastreador Tendências Lotofácil</a>
                              </li>
                            </ul>
                          </li>
                          <li class="dropdown">
                            <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Minha conta <i class="fa fa-level-down"></i></a>
                            <ul class="dropdown-menu">
                              <li>
                                <a tabindex="-1" href="#">
                                  @if(!empty(Auth::user()->name))
                                  {{ Auth::user()->name }}
                                  @endif
                                </a>
                              </li>
                              <li>
                                <a tabindex="-1" href="{{ url('encAlteraSenha')}}">Alterar senha</a>
                              </li>
                              <li>
                                <a tabindex="-1" href="{{ url('logout')}}">Sair</a>
                              </li>
                            </ul>
                          </li>
                        </ul>
                        <ul class="nav">
                            <li class="">
                                <a href="{{ url('pagina_inicial')}}">Inicio</a>
                            </li>
                            <li class="dropdown">
                                <a href="{{ url('quatro') }}">Criar Jogo</a>
                            </li>
                            <li class="dropdown">
                              <a href="{{ route('jogos.index') }}">Jogos salvos</a>
                            </li>
                            <li class="dropdown">
                              <a href="{{ route('lotofacil.index') }}">Resultados </a>
                            </li>
                            <li class="dropdown">
                              <a href="{{ url('ajudar')}}" class="dropdown-toggle">Ajuda </a>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>

      <?php } ?>

      @yield('template')

    </div> <!-- /container -->
    <script src="{{ asset('vendors/jquery-1.9.1.min.js')}}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js')}}"></script>
  </body>
</html>
