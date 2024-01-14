<?php

use App\Http\Controllers\BenefitController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VariationController;
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

Route::get('/company/consumption-last-week/{company}', [CompanyController::class, 'consumptionLastWeek']);
Route::apiresource('benefit', BenefitController::class);
Route::apiresource('company', CompanyController::class);
Route::apiresource('employee', EmployeeController::class);
Route::apiresource('order', OrderController::class);
Route::apiresource('user', UserController::class);
Route::apiresource('variation', VariationController::class);
