<?php
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PaymentController;
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

Route::get('/cursos', [CourseController::class, 'index']);
Route::get('/cursos/{id}', [CourseController::class, 'show']);
Route::get('/cursos/{id}/comprar', [PaymentController::class, 'checkout']);
Route::post('/procesar-pago', [PaymentController::class, 'process']);