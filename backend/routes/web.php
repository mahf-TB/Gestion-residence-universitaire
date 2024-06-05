<?php

use App\Http\Controllers\Admin\ReservationController;
use App\Mail\ValidationEmail;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', function () {
    return view('mails.refuse');
});
Route::get('/send_email', [ReservationController::class, 'validationDemande']);