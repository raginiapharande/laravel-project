<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('students',[StudentController::class,'index']);
Route::get('addstudent',[StudentController::class,'addstudent']);
Route::post('savestudent',[StudentController::class,'savestudent']);
Route::get('editstudent/{id}',[StudentController::class,'editstudent']);
Route::post('updatestudent',[StudentController::class,'updatestudent']);
Route::get('deletestudent/{id}',[StudentController::class,'deletestudent']);

Route::get('xmldata',[StudentController::class,'xmldata']);
Route::post('savexmldata',[StudentController::class,'savexmldata']);

Route::get('/', function () {
    return view('welcome');
});
