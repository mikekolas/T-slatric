<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('about', function () {
    return view('about');
});

Route::get('contact', function () {
    return view('contact');
});

Route::get('docs', function () {
    return view('docs');
});

Route::post('contact/submit','MessagesController@submit'); //submit is function name

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout','LogoutController@logout'); //user logout


Route::get('abo', function() {
  return view('abo');
}); //test receive


Route::get('account',function() {
    return view('user/account');
});

Route::get('dashboard', 'DashboardController@index');
Route::get('kWh', 'DashboardController@quarterWatts');

Route::post('/receive', 'MeasurementsController@saveData');

Route::post('upload', function(\Illuminate\Http\Request $request){
  $filename = Auth::user()->username . ".jpg";
  Intervention\Image\Facades\Image::make($request->file('image'))->save(public_path('images/' . $filename));
});
