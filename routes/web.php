<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SesiController;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('layouts.dashboard'); // arahkan ke view yang sesuai
})->name('dashboard')->middleware('auth');

Route::middleware(['guest'])->group(function() {
    Route::get('/',[SesiController::class,'index'])->name('login');
    Route::post('/',[SesiController::class,'login']);

});

Route::get('home', function (){
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/admin',[AdminController::class,'admin'])->middleware('userAkses:admin');
    Route::get('/petugas',[AdminController::class,'petugas'])->middleware('userAkses:petugas');
    Route::get('/pimpinan',[AdminController::class,'pimpinan'])->middleware('userAkses:pimpinan');
    
});
Route::get('/logout',[SesiController::class,'logout'])->name('logout');