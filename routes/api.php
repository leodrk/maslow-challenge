<?php

use App\Http\Controllers\AuthController;
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

//Public
Route::post('register',[AuthController::class, 'register']);
Route::post('login',[AuthController::class, 'login']);

//Authenticated
Route::middleware(['auth:sanctum'])->group( function () {
    Route::post('logout',[AuthController::class, 'logout']);

    //Companies
    Route::controller(CompanyController::class)->group(function(){
        Route::get('/company/{company}/employee/{name}', 'getEmployeeByFirstName');
        Route::get('/company/{company}/employee/{lastName}', 'getEmployeeByLastName');
        Route::middleware('restrictRole:maslow_admin,company_admin')->group(function (){
            Route::get('/company/{company}/employees', 'getEmployees');
            Route::get('/company/consumption-last-week/{company}', 'consumptionLastWeek');
        });
        Route::middleware('restrictRole:maslow_admin')->group(function(){
            Route::get('/company/billing-by-company', 'billingByCompany');
            Route::post('api/company', 'store');
            Route::put('api/company/{company}', 'update');
            Route::delete('api/company/{company}', 'destroy');
            Route::apiresource('company', CompanyController::class);
        });
    });

    //Benefits
    Route::controller(BenefitController::class)->group(function(){
        Route::get('/benefit/{benefit}/variations', 'getVariations');
        Route::get('/benefit/{name}', 'getByName');
        Route::get('/benefit/{country}', 'getByCountry');
        Route::middleware('restrictRole:maslow_admin')->group(function(){
            Route::post('api/benefit', 'store');
            Route::put('api/benefit/{benefit}','update');
            Route::delete('api/benefit/{benefit}', 'destroy');
        });
    });
    Route::apiresource('benefit', BenefitController::class);

    //Employees
    Route::controller(EmployeeController::class)->group(function(){
        Route::get('/employee/{employee}/orders', 'getOrders');
        Route::middleware('restrictRole:maslow_admin, company_admin')->group(function(){
            Route::post('api/employee', 'store');
            Route::put('api/employee/{employee}', 'update');
            Route::delete('api/employee/{employee}', 'destroy');
        });
        Route::middleware('restrictRole:maslow_admin')->group(function(){
            Route::get('api/employee', 'index');
        });
        Route::apiresource('employee', EmployeeController::class);
    });

    //Variations
    Route::controller(VariationController::class)->group(function(){
        Route::middleware('restrictRole:maslow_admin')->group(function(){
            Route::post('api/variation', 'store');
            Route::put('api/variation/{variation}', 'update');
            Route::delete('api/variation/{variation}', 'destroy');
        });
        Route::apiresource('variation', VariationController::class);
    });

    //Order
    Route::controller(OrderController::class)->group(function(){
        Route::middleware('restrictRole:maslow_admin')->group(function(){
            Route::post('api/order', 'store');
            Route::put('api/order/{order}', 'update');
            Route::delete('api/order/{order}', 'destroy');
        });
        Route::apiresource('variation', VariationController::class);
    });
});
