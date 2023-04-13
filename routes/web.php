<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\UserController;
use App\Repositories\AdminRepository;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $products = \App\Models\Product::all();
    return view('home',['products' => $products]);
});
Route::middleware('guest')->group(function(){
    Route::view('/home','layouts.app')->name('home');
    Route::view('/login','pages.login')->name('login');
    Route::post('/login', [AuthController::class,'authenticate']);
});

Route::get('/register',[UserController::class,'createUser'])->name('add-user');


Route::middleware('auth')->group(function(){

    Route::get('/logout',[AuthController::class,'logout'])->name('logout');


    Route::prefix('/admin')->group(function(){
        Route::post('/create/user',[AdminController::class,'creatUser']); # ADMIN
        Route::get('/fetch/tenant/{tenantID}',[AdminController::class,'fetchTenantMaster']);
        Route::get('/validate/email',[AdminController::class,'validateEmail']);
        Route::get('/users',[AdminController::class,'viewUsers']);
        Route::get('/view/user',[AdminController::class,'viewUserUI'])->name('view-user');
        Route::post('/update/profile/credentials/{id}',[AdminController::class,'updateUserCredentials']); 
        Route::post('/update/profile/information/{id}',[AdminController::class,'updateUserInformation']); #
        Route::get('/profile/{id}',[AdminController::class,'viewUsersProfile'])->name('user.profile'); #NOT FOUND
        Route::get('/change-password/{id}',[AdminController::class,'updateUserCredential'])->name('user.change-password');

        Route::get('/dashboard',[AuthController::class,'dashboard'])->name('dashboard'); 

        Route::view('/products','pages.products.table')->name('viewProducts'); 
        Route::view('/quote_requests','pages.quote_requests.table')->name('viewRequests'); #ADMIN

        Route::get('/logs/{id}',[AdminController::class,'viewLogDetails']);
        Route::post('/action/user/update/{id}',[AdminController::class,'actionUserUpdate']);

        Route::view('/feedback','pages.dashboard.feedback')->name('feedback');
        Route::post('/store/feedback',[AdminController::class,'storeRequest']);

        Route::view('/faq','pages.dashboard.faq')->name('faq');
    });

    Route::get('/profile',[AdminController::class,'viewUsersProfile'])->name('profile');
    Route::get('/change-password',[AdminController::class,'updateUserCredential'])->name('profile.change-password');

     Route::prefix('/email')->name('email.')->group(function(){
        Route::get('/list',[EmailController::class,'getEmails']);
        Route::get('/details/{email_id}',[EmailController::class,'emailDetails']);
     });
        
});








