<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VariationController;
use Illuminate\Support\Facades\Route;

//Public
Route::post('register',[AuthController::class, 'register']);
Route::post('login',[AuthController::class, 'login']);

//Authenticated
Route::middleware(['auth:sanctum'])->group( function () {
    Route::post('logout',[AuthController::class, 'logout']);

    //Companies
    Route::controller(CompanyController::class)->group(function(){
        Route::middleware('restrictRole:maslow_admin,company_admin')->group(function (){
            Route::get('/company/{company}/employees', 'getEmployees');
            Route::get('/company/consumption-last-week/{company}', 'consumptionLastWeek');
            Route::get('company', 'index');
            Route::get('company/{company}', 'show');
        });
        Route::middleware('restrictRole:maslow_admin')->group(function(){
            Route::get('/company/billing-by-company', 'billingByCompany');
            Route::post('company', 'store');
            Route::put('company/{company}', 'update');
            Route::delete('company/{company}', 'destroy');
        });
    });

    //Benefits
    Route::controller(BenefitController::class)->group(function(){
        Route::get('/benefit/{benefit}/variations', 'getVariations');
        Route::get('/benefit/name/{name}', 'getByName');
        Route::get('/benefit/country/{country}', 'getByCountry');
        Route::get('benefit', 'index');
        Route::get('benefit/{benefit}', 'show');
        Route::middleware('restrictRole:maslow_admin')->group(function(){
            Route::post('benefit', 'store');
            Route::put('benefit/{benefit}','update');
            Route::delete('benefit/{benefit}', 'destroy');
        });
    });

    //Employees
    Route::controller(EmployeeController::class)->group(function() {
        Route::get('/employee/{employee}/orders', 'getOrders');
        Route::middleware('restrictRole:maslow_admin, company_admin')->group(function () {
            Route::apiresource('employee', EmployeeController::class);
        });
    });

    //Variations
    Route::controller(VariationController::class)->group(function(){
        Route::get('variation', 'index');
        Route::get('variation/{variation}', 'show');
        Route::middleware('restrictRole:maslow_admin')->group(function(){
            Route::post('variation', 'store');
            Route::put('variation/{variation}', 'update');
            Route::delete('variation/{variation}', 'destroy');
        });

    });

    //Order
    Route::controller(OrderController::class)->group(function(){
        Route::get('order', 'index');
        Route::get('order/{order}', 'show');
        Route::post('order', 'store');
        Route::middleware('restrictRole:maslow_admin')->group(function(){
            Route::put('order/{order}', 'update');
            Route::delete('order/{order}', 'destroy');
        });
    });
});
