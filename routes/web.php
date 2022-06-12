<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\VehicleController;
use App\Models\Vehicle;
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
Route::middleware(['auth'])->group(function(){
    // Route::middleware('company')->group(function(){
    // Route::controller(VehicleController::class)->prefix('vehicle')->name('vehicle.')->group(function(){
    //     Route::get('/','index')->name('index');
    //     Route::get('/','show')->name('show');
    //     Route::get('/','show')->name('show');
    // });
    Route::resource('order',OrderController::class);
    Route::resource('vehicle',VehicleController::class);
    // Route::middleware('user')->group(function(){

    // });
// });
});

require __DIR__.'/auth.php';
