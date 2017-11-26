@extends('layouts.app')

@section('content')

  <div class="well">
    <img id="aboutImg" class="img-circle" class="img-responsive" src="images/mikekolas.jpg">
    <h4 style="text-align:justify;">Hi! I am Michael-Alexandros Savvanis, a 22 years old guy with a passion for creativity,
      tech-friendly and big supporter of DIY. While I am finishing my studies to Informatics Engineering
      Dept. in TEIWM, I developed this IoT infrastructure about energy monitoring. Putting all my Arduino
      experience in practice, while learning new technologies, T-slatric is the result of my efforts all these
      academic years. This thesis is dedicated to Nikola Tesla.
    </h4>

     <h4>The Hardware of this implementation is an Arduino Uno with the addition
        of an non-invasive current sensor, that measures the power consumption.
        With the help of an Ethernet Shield, the data is sent to the webserver, which saves the data.
        The user can log in in the web app and see realtime graph of energy consumption and enrgy consumed on the last quarter.
     </h4>
     <h4>
        The Software of this implementation are the following technologies:
        HTML, CSS, JavaScript, PHP, Laravel, Bootstrap.
     </h4>
  </div>
@endsection
