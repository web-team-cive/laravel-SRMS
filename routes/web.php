<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Middleware\AuthenticateUser;

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
    return view('index');
});

// The route to login api
Route::post('/login', [loginController::class, 'loginApi'])->name('login-api');




Route::get('/dashboard', function () {
    return view('dash');
}); //->middleware('auth.user');






Route::fallback(function () {
    // Return a custom error page or a 404 error
    //abort(404, 'Page not found jhgh');
    // Alternatively, return a view for a custom error page
    return view('404');
});