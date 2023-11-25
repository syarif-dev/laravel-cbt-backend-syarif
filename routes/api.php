<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ExamController;
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

// register
Route::post('/register', [AuthController::class, 'register']);

// login
Route::post('/login', [AuthController::class, 'login']);


Route::middleware(['auth:sanctum'])->group(function() {
    // Logout
    Route::post('/logout', [AuthController::class, 'logout']);

    // create exam
    Route::post('/create-exam', [ExamController::class, 'createExam']);

    // get exam question
    Route::get('/get-exam-question', [ExamController::class, 'getListQuestionByCategory']);

    // post answer
    Route::post('/answer', [ExamController::class, 'answerQuestion']);
});
