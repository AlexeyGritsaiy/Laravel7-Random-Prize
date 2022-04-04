<?php

use App\Http\Controllers\CabinetController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrizeController;
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

\Illuminate\Support\Facades\Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/prize', [PrizeController::class, 'index'])->name('index');
Route::get('/refuse', [PrizeController::class, 'clearPrize'])->name('clearPrize');

Route::get('/cabinet', [CabinetController::class, 'index'])->name('cabinet');
Route::get('/approve', [PrizeController::class, 'accept'])->name('accept');

Route::get('/updateBalans', [CabinetController::class, 'updateBalans'])->name('updateBalans');
Route::get('/withdrawalOfMoney', [CabinetController::class, 'withdrawalOfMoney'])->name('withdrawalOfMoney');

Route::get('/deliveryForm', [DeliveryController::class, 'index'])->name('deliveryForm');
Route::post('/save', [DeliveryController::class, 'save'])->name('save');
