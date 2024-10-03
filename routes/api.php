<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\movieplatform;
use App\Http\Controllers\signupform;


Route::apiResource('/movieslisting',movieplatform::class);



Route::post('/register',[signupform::class,'register']);
Route::post('/login',[signupform::class,'login']);
Route::get('/detail',[signupform::class,'detail'])
->middleware('auth:sanctum');


Route::delete('/login-all', [signupform::class, 'deleteAllUsers']);


Route::delete('delete/{id}', [signupform::class, 'deleteUser']);
