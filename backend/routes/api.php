<?php

use App\Http\Controllers\Admin\EtudiantController;
use App\Http\Controllers\Admin\Logements\BatimentController;
use App\Http\Controllers\Admin\Logements\LogementController;
use App\Http\Controllers\Admin\Logements\MaterielControlleur;
use App\Http\Controllers\Admin\MaintenanceController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\UtilisateurController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Resident\CommandeController;
use App\Http\Controllers\Resident\NotifController;
use App\Http\Controllers\Resident\PubController;
use App\Http\Controllers\Resident\ReparationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    return $request->user();
});

//authentification
Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::post('change_password', [ProfileController::class, 'changeUserPassword']);
    Route::get('/userConnect', [AuthController::class, 'getUser']);
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::group(['controller' => ProfileController::class], function () {
    Route::post('/uploadPhoto',  'ajouterPhotoProfile');
    Route::post('/change-password',  'changeUserPassword');
});

Route::apiResource('/utilisateurs', UtilisateurController::class);

//ETUDIANT routes api CRUD 
Route::apiResource('/etudiants', EtudiantController::class);
Route::get('/etudiant_logement', [EtudiantController::class, 'getEtudiantLogment']);

//BATIMENT et batiments routes api CRUD 
Route::apiResource('/batiments', BatimentController::class);
//LOGEMENT et batiments routes api CRUD 
Route::apiResource('/logement', LogementController::class);
Route::get('/type_logement', [LogementController::class, 'getTypeLogement']);
Route::get('/logement_type', [LogementController::class, 'getLogement']);
Route::post('/uploadImage', [LogementController::class, 'uploadImage']);

Route::group(['controller' => MaterielControlleur::class], function () {
    Route::post('/add-materiel',  'store');
});
//RESERVATIONS routes
Route::group(['controller' => ReservationController::class], function () {
    Route::post('/reservation', 'addReservationAction');
    Route::get('/reservation',  'getAllReservation');
    Route::post('/send_email',  'validationDemande');
    Route::get('/reservation_status', 'countReserseStatus');
});

//MAINTENANCE routes
Route::group(['controller' =>  MaintenanceController::class], function () {
    Route::get('/maintenance',  'index');
    Route::get('/count_status',  'countMaintenanceStatus');
    Route::get('/reparer',  'updateReparation');
    Route::post('/demande_reparation',  'demandeReparation');
});

//Service routes
Route::group(['controller' => ServiceController::class], function () {
    Route::post('/ajouter_service',  'ajouterPlat');
    Route::post('/ajouter/service',  'ajouterService');
    Route::get('/index_service',  'indexResto');
    Route::get('/index-commande',  'indexCommande');
    Route::get('/service_status',  'countStatus');
    Route::get('/showOne/{id}',  'showPlat');
    Route::post('/update_plat/{id}',  'updatePlatResto');
    Route::delete('/deleteService/{id}',  'deleteService');
});
//Service routes
Route::group(['controller' => PubController::class], function () {
    Route::get('/index_pub',  'index');
    Route::post('/add_publication',  'addPublication');
    Route::get('/publication/{id}',  'showOnePub');
});
//Service routes
Route::group(['controller' => NotifController::class], function () {
    Route::get('/index_notif',  'indexNotification');
    Route::get('/read',  'readAll');
});



Route::group(['controller' => CommandeController::class], function () {
    Route::post('/commande-service',  'demandeService');
    Route::get('/index-service',  'index');
    Route::get('/commande-user',  'commandeUser');
});



Route::group(['controller' => ReparationController::class], function () {
    Route::get('/index_reparer',  'index');
    Route::delete('/delete_reparation',  'annulerDemande');
});
