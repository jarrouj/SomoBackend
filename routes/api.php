<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\FrontEnd\ReservationController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/add_reservation' , [ReservationController::class , 'add_reservation']);


Route::get('/get-about',[ApiController::class,'getAbout']);
Route::get('/get-blog',[ApiController::class,'getBlog']);
Route::get('/get-gallery',[ApiController::class,'getGallery']);
Route::get('/get-landing',[ApiController::class,'getLanding']);
Route::get('/get-location',[ApiController::class,'getLocation']);
Route::get('/get-mission',[ApiController::class,'getMission']);
Route::get('/get-opening',[ApiController::class,'getOpening']);
Route::get('/get-reservation',[ApiController::class,'getReservation']);
Route::get('/get-show',[ApiController::class,'getShow']);
Route::get('/get-social',[ApiController::class,'getSocial']);
Route::get('/get-team',[ApiController::class,'getTeam']);
Route::get('/get-wwd',[ApiController::class,'getwwd']);
Route::get('/get-wwd',[ApiController::class,'getwwd']);

Route::get('/get-category-menu',[ApiController::class,'getCategoryMenu']);
Route::get('/get-category-retail',[ApiController::class,'getCategoryRetail']);
Route::get('/get-retail-menu',[ApiController::class,'getRetailMenu']);
Route::get('/get-menu',[ApiController::class,'getMenu']);
Route::get('/get-loc-cat',[ApiController::class,'getLocCat']);
