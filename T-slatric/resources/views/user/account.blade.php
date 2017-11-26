@extends('layouts.app')

@section('content')
<div class="container">
    <h3><img class="pull-left" class="img-responsive" src="entypo/user.svg" style="max-width:23px;">&nbsp;<strong>Welcome {{Auth::user()->username}}</strong></h3>
    <br>
    <div class="row">
        <div class="col-sm-4">
            <div class="panel account">
              <div class="panel-heading">
                <h3 class="panel-title">Account</h3>
              </div>
              <div class="panel-body" style="background-color:white; color: black;">
                <div class="row">
                  <div class="col-xs-6">
                    @if(File::exists('images/' . Auth::user()->username . '.jpg'))
                      <img class="img-rounded" class="pull-left" class="img-responsive" class="img-rounded" src="images/<?php $userImg = Auth::user()->username; echo $userImg; ?>.jpg" style="max-width:100px;">
                    @else
                      <img class="pull-left" class="img-responsive" class="img-rounded" src="entypo/user.svg" style="max-width:100px;">
                    @endif
                  </div>

                  <div class="col-xs-4">
                    <form style="margin-top:20px;" class="" action="upload" enctype="multipart/form-data" method="post">
                      {{ csrf_field() }}

                      <input type="file" name="image" style="color:transparent;">
                      <br>

                      {{Form::submit('Submit',['class'=> 'btn btn-warning'])}}
                    </form>
                  </div>
                </div> <!-- image row end -->
                <br>
                <div class="row accountMenu" style="margin-left:10px; margin-right: 10px;">
                  <a href="dashboard">
                    <hr style="border-width: 4px;">
                    <span>
                      <img class="pull-left img-responsive" src="entypo/gauge.svg" style="max-width:2rem; top:-4px; position:relative;">
                      <strong>&nbsp;Dashboard</strong>
                    </span>
                  </a>
                  <hr style="border-width: 4px;">
                  <span>Second Item</span>
                </div>
              </div> <!-- panel body -->
          </div> <!-- panel primary end -->
        <!-- </div> -->
    </div>

      <div class="col-sm-5">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">My info</h3>
          </div>
          <div class="panel-body">
            <h5 style="float:left;">Name</h5><h5 style="color:blue; float:right;">{{Auth::user()->name}}</h5>
            <h5 style="clear:both; float:left;">Email</h5><h5 style="color:blue; float:right;">{{Auth::user()->email}}</h5>
            <h5 style="clear:both; float:left;">Device ID</h5><h5 style="color:blue; float:right;">{{Auth::user()->deviceID}}</h5>
          </div>
        </div>
      </div>
    </div>
</div>
    <br>
@endsection
