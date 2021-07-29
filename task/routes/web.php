<?php

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/loginwithApi','App\Http\Controllers\api\v1\LoginController@login')->name('LoginwithApi');

Route::post('/loginApi','App\Http\Controllers\api\v1\LoginController@loginApi')->name('LoginApi');
Route::get('/loginApi','App\Http\Controllers\api\v1\LoginController@loginApi')->name('LoginApi');

Route::get('dashboard','App\Http\Controllers\api\v1\LoginController@dash')->name('dashboard');

Route::get('/dashboard/user', 'App\Http\Controllers\api\v1\LoginController@userDash')->name('dashboard.user');


Route::get('getId',[UserController::class,'getId'])->name('users.all');



