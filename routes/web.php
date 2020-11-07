<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\genderController;
use App\Http\Controllers\postController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\LoginController;
use App\Models\Post;
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

Route::middleware(['auth:sanctum', 'verified','gender'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('gender',[genderController::class,'editGender']);
Route::post('gender',[genderController::class,'updateGender'])->name('update-gender');
Route::view('gender','gender');
Route::resource('posts', postController::class)->except([
    'create', 'store', 'update', 'destroy'
]);

Route::get('new',function(){
    
    return view('new');
});
Route::get('login/facebook', [FacebookController::class, 'redirectToProvider']);
Route::get('login/facebook/callback', [FacebookController::class, 'handleProviderCallback']);