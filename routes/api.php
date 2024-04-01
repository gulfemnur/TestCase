<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestcaseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(["prefix"=>"testcase"], function(){
    Route::get("/get/{id}", [TestcaseController::class, "get"]);
    Route::get("/gets", [TestcaseController::class, "gets"]);
    Route::post("/store", [TestcaseController::class, "store"]);
    Route::put("/update/{id}", [TestcaseController::class, "update"]);
    Route::delete("/delete/{id}", [TestcaseController::class, "delete"]);
});
