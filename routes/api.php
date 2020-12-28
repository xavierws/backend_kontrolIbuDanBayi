<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriController;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Route::get('/test', function () {
//    $data = array();
//    $n = 0;
//    $arr = ['a', 'b', 'c'];
//    foreach ($arr as $a) {
//        $data[$n] = [
//            'id'  => $n,
//            'title' => $a,
//        ];
//        $n++;
//    }
//
//    return response()->json([
//        'data' => $data
//    ]);
//});

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    //register the nurse or patient
    Route::post('register', [AuthController::class, 'register']);
    //assign materi for patient
    Route::get('/register/materi', [MateriController::class, 'listMateri']);
    Route::post('/register/materi', [MateriController::class, 'assignMateri']);

    //get the user details
    Route::get('/user', [AuthController::class, 'user']);

    //logout the user
    Route::post('logout', [AuthController::class, 'logout']);

});
