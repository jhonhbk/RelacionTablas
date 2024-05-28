<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PaisController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');

// Rutas para Usuario
//Route::get('/usuarios', 'UsuarioController@index')->name('usuarios.index');
//Route::get('/usuarios/create', 'UsuarioController@create')->name('usuarios.create');
//Route::post('/usuarios', 'UsuarioController@store')->name('usuarios.store');
//Route::get('/usuarios/{usuario}', 'UsuarioController@show')->name('usuarios.show');
//Route::get('/usuarios/{usuario}/edit', 'UsuarioController@edit')->name('usuarios.edit');
//Route::put('/usuarios/{usuario}', 'UsuarioController@update')->name('usuarios.update');
//Route::delete('/usuarios/{usuario}', 'UsuarioController@destroy')->name('usuarios.destroy');


// Rutas para Pais
//Route::get('/paises', 'PaisController@index')->name('paises.index');
//Route::get('/paises/create', 'PaisController@create')->name('paises.create');
//Route::post('/paises', 'PaisController@store')->name('paises.store');
//Route::get('/paises/{usuario}', 'PaisController@show')->name('paises.show');
//Route::get('/paises/{usuario}/edit', 'PaisController@edit')->name('paises.edit');
//Route::put('/paises/{usuario}', 'PaisController@update')->name('paises.update');
//Route::delete('/paises/{usuario}', 'PaisController@destroy')->name('paises.destroy');

Route::resource('usuarios', UsuarioController::class);
Route::resource('paises',PaisController::class);
Route::resource('departamentos',DepartamentoController::class);
Route::resource('alquileres', AlquilerController::class);
Route::resource('inquilinos', InquilinoController::class);
Route::resource('propietarios', PropietarioController::class);
