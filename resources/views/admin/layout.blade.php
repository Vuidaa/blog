<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Laravel Blog - Admin Dashboard</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/united.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    @include('admin.partials.nav')
    <!-- Page Content -->
    <div class="container">
      @include('admin.partials.message')
      @yield('content')
    </div>
    <!-- /.container -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js') }}"></script>
    <script src="{{asset('js/bootstrap-tagsinput.js')}}"></script>
    <script src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
    @yield('scripts')
  </body>
</html>