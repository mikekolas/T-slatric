@extends('layouts.app')

@section('content')
      {{ Form::open(['url' => 'receive']) }}

      {{Form::label('power', 'power')}}
      {{Form::text('power', '',['class' => 'form-control', 'placeholder' => 'Enter name'])}}
      <br>
      {{Form::label('deviceID', 'deviceID')}}
      {{Form::text('deviceID', '',['class' => 'form-control', 'placeholder' => 'Enter name'])}}
      <br>
      {{Form::label('user_id', 'user_id')}}
      {{Form::text('user_id', '',['class' => 'form-control', 'placeholder' => 'Enter name'])}}
      {{Form::submit('Submit',['class'=> 'btn btn-warning'])}}
      {{ Form::close() }}
@endsection
