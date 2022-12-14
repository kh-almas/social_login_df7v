<?php

use App\Http\Controllers\Auth\SocialLoginController;
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
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/sign-in/github',[SocialLoginController::class,'github'])->name('github.login');
Route::get('/sign-in/github/redirect',[SocialLoginController::class,'githubRedirect']);

Route::get('/sign-in/google',[SocialLoginController::class,'google'])->name('google.login');
Route::get('/sign-in/google/redirect',[SocialLoginController::class,'googleRedirect']);
