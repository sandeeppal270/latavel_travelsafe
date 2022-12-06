<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ReportJourneyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GraphController;
use App\Http\Controllers\UsermapController;
use App\Http\Controllers\AddressgraphController;
use App\Http\Controllers\DashbController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\RoughController;
use App\Http\Controllers\CitycrimeController;




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
    return view('welcome');
});
Route::get('/emailview', function () {
    return view('emails.edit');
});
//mam project controller
Route::controller(MyController::class)->group(function(){
     Route::get('/index','index');
     Route::get('/404','badrequest');
     Route::get('/blank','blank');
     Route::get('/button','button');
     Route::get('/chart','chart');
     Route::get('/element','element');
     Route::get('/form','form');
     Route::get('/signin','signin')->name('signin.page');
     Route::get('/signup','signup')->name('signup.page');
     Route::get('/table','table');
     Route::get('/typography','typography');
     Route::get('/widget','widget');
    //  Route::get('/email','email')->name('email.page');
     //Route::get('/emailpage','emailpage')->name('emailpage.page');



});
// Route::controller(EmailController::class)->group(function(){
//     Route::get('/addemail','create');
//     Route::post('/addemail','store');

// });
// Route::controller(EmailController::class)->group(function(){
//     Route::get('/indexpage','index');
//     Route::get('/show','show')->name(emailpages.page);
//     Route::post('/store','store');
//     Route::get('/create','create');
//     Route::get('/edit','edit');
//     Route::put('/update','update');
//     Route::delete('/destroy','destroy');

// });

// Email

Route::resource("/email", EmailController::class);
Route::controller(EmailController::class)->group(function(){
    Route::get('/email','index')->name('email.page');
});


// Users

Route::resource("/users", UserController::class);
// Route::resource("/user", UserController::class);
Route::controller(UserController::class)->group(function(){
Route::get('/user','user')->name('index.page');
});
Route::controller(UserController::class)->group(function(){
Route::get('/users','index')->name('user.page');
});

// Complaint

Route::resource("/complaint", ComplaintController::class);
Route::get('/complaint',[ComplaintController::class,'index']);
Route::controller(ComplaintController::class)->group(function(){
Route::get('/complaint','index')->name('locations.page');
});

// Report

Route::resource("/report", ReportJourneyController::class);
Route::get('/report',[ReportJourneyController::class,'index']);
Route::controller(ReportJourneyController::class)->group(function(){
    Route::get('/report','index')->name('report.page');
});






Route::get('/dashboard',[HomeController::class,'dashboard']);
Route::get('/dash',[HomeController::class,'dash']);


Route::controller(HomeController::class)->group(function(){
    Route::get('/dash','dash')->name('dashboard.page');
});

Route::get('/home',[HomeController::class,'home']);
Route::get('/template',[HomeController::class,'template']);
Route::get('/index',[HomeController::class,'index']);



// Route::get('/dashboard',[UserController::class,'index']);






// Route::get('/dashboard','HomeController@dashboard');
Route::get('/sidebar', function () {
    return view('sidebar');
});
Route::get('/home', function () {
    return view('home');
});

// profile

Route::controller(ProfileController::class)->group(function(){
    Route::get('/profile','index')->name('profile.page');
});
Route::get('/editpage', function () {
    return view('emails.edit');
});
Route::get('/usersedit', function () {
    return view('users.edit');
});
Route::get('/login',[LoginController::class,'index']);
// Route::get('/analytics',[GraphController::class,'index']);
Route::controller(GraphController::class)->group(function(){
    Route::get('/analytics','index')->name('analytics.page');
});

Route::controller(UsermapController::class)->group(function(){
    Route::get('/useranalytics','index')->name('usergraph.page');
    
});
Route::controller(AddressgraphController::class)->group(function(){
    Route::get('/addressanalytics','index')->name('addressgraph.page');
});
Route::controller(DashbController::class)->group(function(){
    Route::get('/dashb','index')->name('dashb.page');
});
Route::controller(IncidentController::class)->group(function(){
    Route::get('/incident','index')->name('incident.page');
});
Route::controller(RoughController::class)->group(function(){
    Route::get('/rough','index')->name('rough.page');
});
// Route::get('/district',[RoughController::class,'index'])->name('rough.page');
Route::post('/getCity',[RoughController::class,'getCity']);
Route::post('/getZip',[RoughController::class,'getZip']);
Route::controller(CitycrimeController::class)->group(function(){
    Route::get('/citycrime','index')->name('citycrime.page');
});





