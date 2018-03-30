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
  </head>
  <body>

    <!-- nav -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <a class="navbar-brand" href="#">SISCAR</a>
    </nav>
    <!-- fim nav -->

    <!-- container -->
    <div class="container-fluid">
      <div class="row">

        <!-- menu lateral -->
        <div class="col-md-2">

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
    <script type="text/javascript">

    </script>
    @stack('script')
  </body>
</html>
