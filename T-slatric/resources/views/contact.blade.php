@extends('layouts.app')

@section('content')
<h2>Contact</h2>
<br>
@if(count($errors) > 0)
  @foreach($errors->all() as $error)
    <div class="alert alert-danger">{{$error}}</div>
  @endforeach
@endif
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<div class="container">
  <div class="row">
    <ul style="list-style: none; margin: 0; padding: 0;"> <!--removes bullets and new line-->
      <div class="col-md-3" style="margin: 0; padding: 0;">
        <li style="display:inline;"><img class="clearfix" class="pull-left" class="img-responsive" src="entypo/mail.svg" style="max-width:20px;"> &nbsp; michalsavv@gmail.com</li>
      </div>
      <div class="col-md-3" style="margin: 0; padding: 0;">
        <li style="display:inline;"><img class="clearfix" class="pull-left" class="img-responsive" src="entypo/github.svg" style="max-width:20px;"> &nbsp; github.com/mikekolas</li>
      </div>
      <div class="col-md-3" style="margin: 0; padding: 0;">
        <li style="display:inline;"><img class="clearfix" class="pull-left" class="img-responsive" src="entypo/linkedin.svg" style="max-width:20px; margin-bottom:7px;"> &nbsp; linkedin.com/in/michalsavv</li>
      </div>
    </ul>
  </div>
</div>
<br>
{!! Form::open(['url' => 'contact/submit']) !!}
    <!--<div class="form-group">
       {{Form::label('name', 'Name')}}
       {{Form::text('name', '',['class' => 'form-control', 'placeholder' => 'Enter name'])}}
    </div>
    <div class="form-group">
       {{Form::label('email', 'e-mail address')}}
       {{Form::text('email', '',['class' => 'form-control', 'placeholder' => 'example@mailprovider.com'])}}
    </div>
    <div class="form-group">
       {{Form::label('message', 'Message')}}
       {{Form::textArea('message', '',['class' => 'form-control', 'placeholder' => 'Enter your message here'])}}
    </div>
    <div>
      {{Form::submit('Submit',['class'=> 'btn '])}}
    </div> -->
    <div class="form-group">
      {{Form::label('name', 'Name')}}
      {{Form::text('name', '',['class' => 'form-control', 'placeholder' => 'Enter name'])}}
      <br>
      {{Form::label('email', 'e-mail address')}}
      {{Form::text('email', '',['class' => 'form-control', 'placeholder' => 'example@mailprovider.com'])}}
      <br>
      {{Form::label('subject', 'Subject')}}
      {{Form::text('subject', '',['class' => 'form-control', 'placeholder' => 'Message Subject'])}}
      <br>
      {{Form::label('message', 'Message')}}
      {{Form::textArea('message', '',['class' => 'form-control', 'placeholder' => 'Enter your message here'])}}
      <br>
      {{Form::submit('Submit',['class'=> 'btn btn-warning'])}}

    </div>
{!! Form::close() !!}
@endsection
