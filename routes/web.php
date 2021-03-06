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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
Route::middleware(['auth'])->group(function(){
    Route::resource('order',OrderController::class)->except(['store']);
    Route::post('order/{vehicle}',[OrderController::class,'store'])->name('order.store');
    Route::resource('vehicle',VehicleController::class)->except(['show','index']);
});
Route::get('vehicle',[VehicleController::class,'index'])->name('vehicle.index');
Route::get('vehicle/{vehicle}',[VehicleController::class,'show'])->name('vehicle.show');

require __DIR__.'/auth.php';
