<!--This is developed by Michail-Alexandros Savvanis on 30 of August 17:00 -->
<!DOCTYPE html>
<html>
  <head>
    <title>T-slatric</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="site_images/favicon.png" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    {!! Charts::styles() !!}
  </head>
  <body style="font-family:Prime">
    @include('includes.navbar')
    @yield('videobg')
    <div class="container" style="height=100%;">
      <div class="row">
          @yield('content')
      </div>
    </div>

    @include('includes.footer')

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
