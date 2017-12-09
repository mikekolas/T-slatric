@extends('layouts.app')
@section('content')
  <!-- <p><?php echo count($messages); ?></p> -->
  @for ($i = 0; $i < count($messages); $i++)
  <div class="container">
    <div class="well">
    <div class="row">
          <div class="col-md-1">
            <div class="row">
              <img class="img-responsive" src="entypo/message.svg" style="text-align:center;max-width:3rem; top:-4px; margin:auto;">
            </div>
            <div class="row">
              <h4 style="text-align:center;"> {{ $messages[$i]->id }}</h4>
            </div>
          </div> <!-- first column -->
          <div class="col-md-9">
            <div class="row">
              <h3 style="margin-top:5px;color:#00a460;">{{ $messages[$i]->subject }}</h3>
            </div>
            <div class="row">
              <h5 style="text-align:justify;"> {{ $messages[$i]->message }}</h5>
            </div>
          </div>
          <div class="col-md-2">
            <h4>Sent by: {{ $messages[$i]->name }} </h4>
            <h5 style="color:#00a480;"> {{ $messages[$i]->email }} </h5>
          </div>
      </div>

    </div>
  </div>
  @endfor
@endsection
