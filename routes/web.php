<?php
//No se pierde nada con agregar de mas
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Routes;
use App\User;
use GuzzleHttp\Client;
use App\Mail\Talky;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ApiController;

//Rutas de Auth
Route::namespace('App\Http\Controllers\Auth')->middleware('guest')->group(function () {
	Route::prefix('')->group(function () {
  Route::get('/login','LoginController@show_login_form')->name('login');
  Route::post('/login','LoginController@process_login')->name('login');
  Route::get('/register','LoginController@show_signup_form')->name('register');
  Route::post('/register','LoginController@process_signup');
  Route::post('/logout','LoginController@logout')->name('logout');
  
    });
  
});
Route::get('/logout','App\Http\Controllers\Auth\LoginController@logout');

//Ruta de Home Predeterminada __ Cuestion de conveniencia
Route::get('/', function () {
    return view('welcome');
});

//Ruta de Home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Rutas de Contacto
Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');