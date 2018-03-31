<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SISCAR - @yield('title')</title>

    <!-- style -->
    <link rel="stylesheet" href="{{ asset('css/master.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  </head>
  <body>

    <!-- nav -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <a class="navbar-brand" href="#">SISCAR</a>
      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          @guest

          @else
              <li class="nav-item dropdown" style="margin-right:70px;">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu" aria-labelledby="navbarDropdown" >

                      <a class="dropdown-item" href="{{ route('users.edicao', Auth::user()) }}">Meu Cadastro</a>

                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          Sair
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
              </li>
          @endguest
      </ul>
    </nav>
    <!-- fim nav -->

    <!-- container -->
    <div class="container-fluid">
      <div class="row">

        <!-- menu lateral -->
        <div class="col-md-2">
        @guest

        @else
          @if(Auth::user()->perfil_id === '3')

          @else
          <div class="menu-lateral">
            <div class="card panel-menu-lateral" >
              <div class="card-header bg-info">
                USUÁRIOS
              </div>
            </div>
            <ul>
              <li> <a href="{{ route('users.listar') }}" class="btn btn-sm btn-menu"> Listar </a> </li>
              <li> <a href="{{ route('users.cadastro') }}" class="btn btn-sm btn-menu"> Cadastro </a> </li>
            </ul>

            <div class="card panel-menu-lateral" >
              <div class="card-header bg-info">
                VEÍCULOS
              </div>
            </div>
            <ul>
              <li> <a href="#" class="btn btn-sm btn-menu"> Listar </a> </li>
              <li> <a href="#" class="btn btn-sm btn-menu"> Cadastro </a> </li>
            </ul>
          </div>
          @endif
        @endguest
        </div>
        <!-- fim menu lateral -->

        <!-- content -->
        <div class="col-md-10">
          @yield('content')
        </div>
        <!-- fim content -->

      </div>
    </div>
    <!-- fim container -->

    <!-- rodapé -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-bottom">
      <div class="mx-auto text-light">
        <h6>SISCAR - 2018</h6>
      </div>
    </nav>

    <script src="{{ asset('js/master.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/init.js') }}" charset="utf-8"></script>

    @if(session('alert'))
    <script type="text/javascript">
      swal({
        type : "{{ session('alert')['type'] }}",
        text: "{{ session('alert')['text'] }}",
      });
    </script>
    @endif
    @stack('script')
  </body>
</html>
