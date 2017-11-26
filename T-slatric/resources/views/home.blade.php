@extends('layouts.app')

@section('videobg')
<div class="bg hidden-lg hidden-xl">
  <!-- <img src="site_images/mobile-bg.png"> -->
  <div>

  </div>
</div>

<div class="container" style="width: 100%;">

    <div class="video_bg">
        <div class="row">
          <h1 align="center" id="welcome">Welcome to <img src="site_images/logo.png" style="max-width:150px; margin-top:-10px; margin-left: -17px;"></h1>
        </div>

        <div class="row" style="background-color: black;"> <!--choose video or image background depending on viewport-->
            <span class="hidden-md hidden-sm hidden-xs">
              <video id="videobg" preload="auto" autoplay loop muted>
                  <source src="videos/electric_bulb_hd_stock_video.mp4" type="video/mp4">
                <!-- video by Phil Fried, Mazwai team downloadesd from https://www.videezy.com/random-objects/2313-electric-bulb-hd-stock-video and the license is https://creativecommons.org/licenses/by/3.0/-->
              </video>
            </span>
            <!-- <div class="crop hidden-lg hidden-xl"></div> -->
        </div>
        <div class="row quote">
          <blockquote id="quote" align="center">
            <span>Our virtues and our failings are inseparable, like force and matter. When they separate, man is no more.</spans>
              <footer>Quote By <cite>Nikola Tesla</cite></footer>
            </blockquote>
        </div>
    </div>

</div> <!-- Video container ends -->
@endsection
