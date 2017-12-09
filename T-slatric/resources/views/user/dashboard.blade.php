@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-sm-9">
        {{--  --}}
        {!! $chart->html() !!}

        {{--  --}}
        {!! Charts::scripts() !!}
        {!! $chart->script() !!}
      </div>
      <div class="col-sm-3">
        <div class="panel account">
          <div class="panel-heading">
            <h3 class="panel-title">My consumption</h3>
          </div>
          <div class="panel-body" style="background-color:white; color: black;">
            <p>Today's kWh is:&nbsp;
              <?php
                $dkwh = \App\Http\Controllers\DashboardController::dayWatts();
                $dkwh = number_format((float)$dkwh/1000, 2, '.','');
                echo '<span style="color:green;font-weight: bold;">'. $dkwh . ' kWh</span>';
              ?>
            </p>
            <p>This month's kWh is:&nbsp;
              <?php
                $mkwh = \App\Http\Controllers\DashboardController::monthWatts();
                $mkwh = number_format((float)$mkwh/1000, 2, '.','');
                echo '<span style="color:green;font-weight: bold;">'. $mkwh . ' kWh</span>';
              ?>
            </p>
            <p>This quarter's kWh is:&nbsp;
              <?php
                $kwh = \App\Http\Controllers\DashboardController::quarterWatts();
                $kwh = number_format((float)$kwh/1000, 2, '.','');
                echo '<span style="color:green;font-weight: bold;">'. $kwh . ' kWh</span>';
              ?>
            </p>
            <p>This year's kWh is:&nbsp;
              <?php
                $ykwh = \App\Http\Controllers\DashboardController::yearWatts();
                $ykwh = number_format((float)$ykwh/1000, 2, '.','');
                echo '<span style="color:green;font-weight: bold;">'. $ykwh . ' kWh</span>';
              ?>
            </p>
          </div> <!-- panel primary end -->
      </div>
    </div>
  </div>
</div>
@endsection
