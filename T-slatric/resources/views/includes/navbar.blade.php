<!-- NAVIGATION BAR - MENU -->

<nav style="background-color:#363636; z-index:100" class="navbar navbar-inverse">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/"><img class="pull-left" class="img-responsive" src="site_images/logo.png" style="max-width:95.5px; margin-top:-3px;" ></a>
        <!--<a class="navbar-brand" href="#">T-slatric</a>-->
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav pull-right navbar-nav">

          <!-- <li class="{{Request::is('docs') ? 'active' : ''}}"><a href="docs" style="color:white;">Docs</a></li> -->
          <li class="{{Request::is('about') ? 'active' : ''}}"><a href="about" style="color:white;">About</a></li>
          <li class="{{Request::is('contact') ? 'active' : ''}}"><a href="contact" style="color:white;">Contact</a></li>
          @if(Auth::user())
            <li class="dropdown">
              <a href="#" style="color:white;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="account">Account <img class="pull-right" class="img-responsive"  src="entypo/user.svg" style="max-width:15%;"> </a></li>
                <li><a href="dashboard">Dashboard <img class="pull-right" class="img-responsive" src="entypo/gauge.svg" style="max-width:15%;"> </a></li>
                @if(Auth::user()->status == 1)
                  <li><a href="messages">Messages <img class="pull-right" class="img-responsive" src="entypo/message.svg" style="max-width:15%;"> </a></li>
                @endif
                <li role="separator" class="divider"></li>
                <li><a href="logout">Log out <img class="pull-right" class="img-responsive" src="entypo/log-out.svg" style="max-width:15%;"></a></li>
              </ul>
            </li>
          @else
            <li class="{{Request::is('register') ? 'active' : ''}}"><a href="register" style="color:white;">Register</a></li>
            <li class="{{Request::is('login') ? 'active' : ''}}"><a href="login" style="color:white;">Log in</a></li>
          @endif
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
