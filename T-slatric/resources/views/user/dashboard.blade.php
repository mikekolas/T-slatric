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
            <h3 class="panel-title">Quarter kWh</h3>
          </div>
          <div class="panel-body" style="background-color:white; color: black;">
            <p>This quarter's kWh is:&nbsp;
              <?php
                $kwh = \App\Http\Controllers\DashboardController::quarterWatts();
                $kwh = number_format((float)$kwh, 2, '.','');
                echo '<span style="color:green;font-weight: bold;">'. $kwh . ' kWh</span>';
              ?>
            </p>
          </div> <!-- panel primary end -->
      </div>
    </div>
  </div>
</div>
@endsection
