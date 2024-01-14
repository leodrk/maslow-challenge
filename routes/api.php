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

//Companies
Route::get('/company/{company}/employees', [CompanyController::class, 'getEmployees']);
Route::get('/company/{company}/employee/{name}', [CompanyController::class, 'getEmployeeByFirstName']);
Route::get('/company/{company}/employee/{lastName}', [CompanyController::class, 'getEmployeeByLastName']);
Route::get('/company/consumption-last-week/{company}', [CompanyController::class, 'consumptionLastWeek']);
Route::get('/company/billing-by-company', [CompanyController::class, 'billingByCompany']);
Route::apiresource('company', CompanyController::class);

//Benefits
Route::get('/benefit/{benefit}/variations', [BenefitController::class, 'getVariations']);
Route::get('/benefit/{name}', [BenefitController::class,'getByName']);
Route::get('/benefit/{country}', [BenefitController::class,'getByCountry']);
Route::apiresource('benefit', BenefitController::class);

//Employees
Route::get('/employee/{employee}/orders', [EmployeeController::class, 'getOrders']);
Route::apiresource('employee', EmployeeController::class);

//Users
Route::apiresource('user', UserController::class);

//Variations
Route::apiresource('variation', VariationController::class);

//Order
Route::apiresource('order', OrderController::class);
