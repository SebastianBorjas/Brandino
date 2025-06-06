<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/afiliacion', function () {
    return view('afiliacion');
});

Route::get('/nosotros', function () {
    return view('about');
});

Route::get('/cursos', function () {
    return view('courses');
});

Route::view('/servicios', 'servicios')->name('servicios');
Route::view('/bolsa', 'bolsa')->name('bolsa');

Route::get('/contacto', function () {
    return view('contact');
});

Route::get('/bolsa-trabajo', function () {
    return view('bolsa');
});

Route::get('/renta-salas', function () {
    return view('renta');
});