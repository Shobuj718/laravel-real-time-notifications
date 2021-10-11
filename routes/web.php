<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

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


Route::get('/', function () {
    auth()->login(User::first());

    return view('welcome');
});

//real time message send using event channel
Route::get('/real-time-event', function(){
    event(new App\Events\RealTimeMessage('RealTimeMessage send'));
    dd('real-time-event send');
});

//real time message send using notification
Route::get('/real-time-notification', function(){
    $user = User::first();
    $user->notify(new App\Notifications\RealTimeNotification('RealTimeNotification message send'));
    dd('real-time-notification send');
});