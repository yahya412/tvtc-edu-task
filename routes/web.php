<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\genderController;
use App\Http\Controllers\subscribesController;
use App\Http\Controllers\postController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\LoginController;
use App\Models\Post;
use App\Models\Subscribe;
use App\Mail\subscribeMail;
use Illuminate\Support\Facades\Mail;
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
    return view('index');
});
//Route::get('/subscribe', function () {
//    return view('emails.subscribe');
//});
//Route::view('subscribe','emails.subscribe');
//Route::get('email', function () {
////   Mail::to('yahya412@yahoo.com')->send(new subscribeMail());
//   dd($this->subscriber);
//    Mail::to($this->subscriber)->send(new subscribeMail());
//   
//   return new subscribeMail();
//});
Route::post('subscribe',[subscribesController::class,'store'])->name('subscribe');


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
Route::get('/post/{id}',[postController::class,'show'])->name('show');