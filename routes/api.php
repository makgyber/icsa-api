<?php

use Illuminate\Support\Facades\Route;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WithdrawalController;
use App\Http\Controllers\DepositController;

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


Route::post('/auth/loginRequest', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->get('/user', [UserController::class, 'profile']);

Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->post('/auth/logout', [AuthController::class, 'logout']);


Route::middleware('auth:sanctum')->get('/trans/userAccountInformation', [UserController::class, 'profile']);

Route::middleware('auth:sanctum')->post('/deposits/submitDeposit', [DepositController::class, 'deposit']);
Route::middleware('auth:sanctum')->post('/trans/withdrawal', [WithdrawalController::class, 'withdraw']);
Route::middleware('auth:sanctum')->get('/trans/banks', [WithdrawalController::class, 'banks']);
