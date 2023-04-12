<?php

use App\Http\Controllers\TenantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('secure:api')->prefix('/migrate')->group(function(){
    Route::get('/tenants',[TenantController::class,'tenantMasterMigration']);
    Route::get('/soa',[TenantController::class,'soaImport']);
    Route::get('/or',[TenantController::class,'officialReceiptImport']);
    Route::get('/others',[TenantController::class,'othersImport']);
});

// Route::prefix('/migrate')->group(function(){
//     Route::get('/tenants',[TenantController::class,'tenantMasterMigration']);
//     Route::get('/soa',[TenantController::class,'soaImport']);
//     Route::get('/or',[TenantController::class,'officialReceiptImport']);
//     Route::get('/others',[TenantController::class,'othersImport']);
// });