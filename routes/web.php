<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\MallDirectoryController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\StatementOfAccountController;
use App\Http\Controllers\TenantController;
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
        Route::post('/update/profile/credentials/{id}',[AdminController::class,'updateUserCredentials']); #ADMIN
        Route::post('/update/profile/information/{id}',[AdminController::class,'updateUserInformation']); #ADMIN
        Route::get('/profile/{id}',[AdminController::class,'viewUsersProfile'])->name('user.profile'); #NOT FOUND
        Route::get('/change-password/{id}',[AdminController::class,'updateUserCredential'])->name('user.change-password');

        Route::get('/dashboard',[AuthController::class,'dashboard'])->name('dashboard'); #ADMIN


        Route::get('/tenant/list',[TenantController::class,'getActiveTenants']); #ADMIN
        Route::view('/tenants','pages.tenants.table')->name('viewTenants'); #ADMIN
        Route::view('/products','pages.products.table')->name('viewProducts'); #ADMIN

        Route::get('/contracts/{id}',[ContractController::class,'contractListView'])->name('admin.view.contracts'); #ADMIN ACCESS
        Route::get('/tenant/contracts/{contractID}',[ContractController::class,'contractList']);
        Route::get('/contract/soa/list',[ContractController::class,'contractSoaList']); #ADMIN & NOT USED
        Route::post('/create/contract/{tenant_id}',[ContractController::class,'createTenantContract']); #ADMIN

        Route::post('/remove/soa/{id}',[AdminController::class,'removeSoa']);
        Route::post('/remove/or/{id}',[AdminController::class,'removeOR']);
        Route::post('/remove/others/{id}',[AdminController::class,'removeOthers']);

        // Route::post('/create/soa/{tenant_id}',[StatementOfAccountController::class,'createStatementOfAccount']); #ADMIN

        Route::get('/logs/{id}',[AdminController::class,'viewLogDetails']);
        Route::get('/finance/logs',[AdminController::class,'viewfinanceLogsDetails']);
        Route::post('/action/user/update/{id}',[AdminController::class,'actionUserUpdate']);

        Route::view('/feedback','pages.dashboard.feedback')->name('feedback');
        Route::post('/store/feedback',[AdminController::class,'storeRequest']);

        Route::view('/faq','pages.dashboard.faq')->name('faq');
    });

    Route::prefix('/mall-directory')->group(function(){
        Route::get('/',[MallDirectoryController::class,'viewMalls'])->name('malls');
        Route::post('/store',[MallDirectoryController::class,'storeMallDirectory']);
        Route::post('/store/mall-analyst/{mallID}',[MallDirectoryController::class,'storeMallAnalyst']);
        Route::post('/deactivate/analyst/{analyst_id}',[MallDirectoryController::class,'removeAnalyst']);
        Route::post('/get/analyst/{analystID}',[MallDirectoryController::class,'getAnalyst']);
        Route::post('/update/analyst/{updateAnalystID}',[MallDirectoryController::class,'updateAnalystInfo']);
    });

    Route::prefix('/statement')->group(function(){
        Route::prefix('/admin')->group(function(){
            Route::post('/create/{tenant_id}',[StatementOfAccountController::class,'createStatementOfAccount']); #ADMIN
        });
        Route::get('/{tenantId}',[StatementOfAccountController::class,'statementOfAccountLists']); #TENANT SELF ID AND ADMIN
        Route::get('/attachments/{soaNumber}',[StatementOfAccountController::class,'statementOfAccountAttachment']); #TENANT SELF ID AND ADMIN
    });

    Route::prefix('/contract')->group(function(){
        Route::get('/{id}',[ContractController::class,'contractDetails'])->name('contract-details'); #TENANT SELF ID AND ADMIN
        Route::get('/bir/2307/list/{lease_id}',[ContractController::class,'birList']);
        Route::post('/bir/2307/create/{contractID}',[ContractController::class,'contractBIR']);
        Route::get('/download/bir/{bir_attachment_id}',[ContractController::class,'downloadBir']);
        Route::post('/reject/bir/2307/{id}',[ContractController::class,'rejectBIR2307']);
        Route::post('/accept/bir/2307/{id}',[ContractController::class,'acceptBIR2307']);

        Route::post('/store/others/{tenant_number}',[ContractController::class,'storeOtherAttachment']);
        Route::get('/bir/others/list/{tenant_number}',[ContractController::class,'birOthersList']);
        Route::get('/bir/rejected/notification',[ContractController::class,'rejectedBir']);
        Route::get('/download/bir/others/{bir_other_attachment_id}',[ContractController::class,'downloadBirOther']);

        Route::get('/validate/existing/{tenantNumber}',[ContractController::class,'validateContractExist']);
        Route::post('/add/more/tenant',[ContractController::class,'addMoreTenantContract']);

        Route::post('/create/proof/payment/attach/{contract_id}',[ContractController::class,'attachProofOfPayment']);
        Route::get('/pop/list/{lease_id}',[ContractController::class,'popList']);

        Route::get('/business/type',[ContractController::class,'getContractBusinessType']);
    });

    Route::prefix('/announcement')->name('announcement.')->group(function(){
        Route::post('/store',[AnnouncementController::class,'storeAnnouncement']);
        Route::get('/view/{id}',[AnnouncementController::class,'viewAnnouncement'])->name('view');
        Route::get('/list',[AnnouncementController::class,'announcementList'])->name('list');
        Route::get('/tenant/list',[AnnouncementController::class,'tenantList']);
        Route::get('/deactivate/{announcementID}',[AnnouncementController::class,'deactivateAnnouncement'])->name('deactivate');


    });

        Route::get('/profile',[AdminController::class,'viewUsersProfile'])->name('profile');
        Route::get('/change-password',[AdminController::class,'updateUserCredential'])->name('profile.change-password');
        Route::get('/contracts',[ContractController::class,'contractListView'])->name('contracts'); #TENANT


     Route::get('/tenant/migrations',[TenantController::class,'tenantMigrationView'])->name('tenant.migration.view');

     Route::get('/tenant/migration/list',[TenantController::class,'tester']);



     Route::prefix('/tenant')->name('tenant.')->group(function(){
            // Route::get('/migration',[TenantController::class,'tenantMasterMigration']);
            Route::get('/or/{contractId}',[ContractController::class,'officialReceiptList']);
            Route::get('/contracts/{leaseNumber}',[NoticeController::class,'tenantContracts']);
            Route::get('/list',[TenantController::class,'tenantList']);

     });


    //  Route::prefix('/import')->name('import.')->group(function(){
    //     Route::get('/soa',[TenantController::class,'soaImport']);
    //     Route::get('/or',[TenantController::class,'officialReceiptImport']);
    //  });

     Route::prefix('/download')->name('download.')->group(function(){
        Route::get('',[AttachmentController::class,'download']); #TENANT SELF ID AND ADMIN
        Route::get('/notice/{id}',[NoticeController::class,'downloadNotice'])->name('notice');
        Route::get('/soa/{soaNumber}',[AttachmentController::class,'downloadSoa']);
        Route::get('/or/{id}',[ContractController::class,'officialReceiptDownload']);
        Route::get('/user/lists',[PrintController::class,'printpreviewUser'])->name('users');
        Route::get('/tenant/lists',[PrintController::class,'pdfpreviewTenant'])->name('tenants');
        Route::get('/proof/of/payments/{id}',[ContractController::class,'downloadProofOfPayment']);
    });

     Route::prefix('/notice')->name('notice.')->group(function(){
        Route::get('',[NoticeController::class,'addNoticeView'])->name('add');

        Route::get('/details/{noticeId}',[NoticeController::class,'noticeDetails']);

        Route::post('/storev2',[NoticeController::class,'store']);
     });

     Route::prefix('/email')->name('email.')->group(function(){
        Route::get('/list',[EmailController::class,'getEmails']);
        Route::get('/details/{email_id}',[EmailController::class,'emailDetails']);
     });
        Route::get('/notices',[NoticeController::class,'getNotices']);
        Route::get('/tenants/cache',[TenantController::class,'tenants']);
});


// Route::get('/test',[AnnouncementController::class,'test']);
// Route::get('/tenant/migration',[TenantController::class,'tenantMasterMigration']);
// Route::get('/import/soa',[TenantController::class,'soaImport']);
// Route::get('/import/or',[TenantController::class,'officialReceiptImport']);
// Route::get('/tenant/or/{contractId}',[ContractController::class,'officialReceiptList']);
// Route::get('/tenant/contracts/{leaseNumber}',[NoticeController::class,'tenantContracts']);
// Route::get('/print/user',[PrintController::class,'printpreviewUser'])->name('printPreviewUser');
// Route::get('/pdf/tenant/',[PrintController::class,'pdfpreviewTenant'])->name('pdfpreviewTenant');
// Route::get('/notice/details/{noticeId}',[NoticeController::class,'noticeDetails']);
// Route::get('/notice',[NoticeController::class,'addNoticeView'])->name('notice');
// Route::post('/notice/storev2',[NoticeController::class,'storev2']);







