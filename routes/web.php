<?php

use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\AdminController;

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
    return redirect()->route('login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::controller(UserController::class)->group(function (){
        Route::get('/dashboard', 'index')->name('dashboard');
        // Route::post('/contact/Store', 'ContactStore')->name('contact.store');
    });

    Route::resource('Applications', ApplicationsController::class)->except('show');

    Route::controller(ApplicationsController::class)->group(function (){
        Route::get('Applications/createApp/{id}', 'CreateApplication')->name('app.create');
        Route::get('myApps', 'MyApplications')->name('my.applications');
        // Route::post('/contact/Store', 'ContactStore')->name('contact.store');
    });


    Route::controller(PaymentsController::class)->group(function (){
        Route::get('Payments', 'index')->name('payments');
        // Route::get('Payments/{id}', 'Show')->name('payments.show');
        // Route::get('Payments/query/{id}', 'QueryPmt')->name('payments.query');
    });


});


require __DIR__.'/auth.php';





Route::middleware(['auth:admin_guard'])->group(function () {
    Route::controller(AdminController::class)->group(function (){

        Route::get('/admin/dashboard', 'admin_dashboard')->name('admin.dashboard');
        Route::get('Users/Applications', 'UserApplications')->name('users.applications'); 
        Route::get('unblock-user/{id}', 'Unblockuser')->name('user.unblock');
        Route::get('block-user/{id}', 'Blockuser')->name('user.block'); 


        // Route::get('users', 'Users')->name('admin.users');  
        // Route::get('ticket', 'Ticket')->name('admin.ticket');  
        // Route::get('promo', 'Promo')->name('admin.promo');  
        // Route::get('message', 'Messages')->name('admin.message'); 
        
        // Route::post('account', 'AccountUpdate')->name('admin.account.update');    

        //User controller
        // Route::get('users', 'Users')->name('admin.users');  
        // Route::get('messages', 'Messages')->name('admin.message');  
       
        // Route::get('manage-user/{id}', 'Manageuser')->name('user.manage');
        // Route::get('user/delete/{id}', 'Destroyuser')->name('user.delete');
        // Route::get('email/{id}/{name}', 'Email')->name('admin.email');
        // Route::post('email_send', 'Sendemail')->name('user.email.send');    
        // Route::get('promo', 'Promo')->name('admin.promo');
        // Route::post('promo', 'Sendpromo')->name('user.promo.send');
        // Route::get('message/delete/{id}', 'Destroymessage')->name('message.delete');
        // Route::get('ticket', 'Ticket')->name('admin.ticket');
        // Route::get('ticket/delete/{id}', 'Destroyticket')->name('ticket.delete');
        // Route::get('close-ticket/{id}', 'Closeticket')->name('ticket.close');
        // Route::get('manage-ticket/{id}', 'Manageticket')->name('ticket.manage');
        // Route::post('reply-ticket', 'Replyticket')->name('ticket.reply');
        // Route::post('profile-update', 'Profileupdate');
        // Route::get('approve-kyc/{id}', 'Approvekyc')->name('admin.approve.kyc');
        // Route::get('reject-kyc/{id}', 'Rejectkyc')->name('admin.reject.kyc');

    });



    // Route::controller(SettingController::class)->group(function (){
    //     //Setting controller
    //     Route::post('bank', 'BankUpdate')->name('admin.bank.update');  
    //     Route::get('settings', 'Settings')->name('admin.setting');
    //     Route::post('settings', 'SettingsUpdate')->name('admin.settings.update');
     
    // });


    // ADMIN CONTROLLING USERS ACTIVITIRES
    Route::resource('Users', UserController::class);

    // PAYMENTS 
    
    Route::controller(PaymentsController::class)->group(function (){
        Route::get('All/Payments', 'show')->name('payments.show');
        // Route::get('Payments/{id}', 'Show')->name('payments.show');
        // Route::get('Payments/query/{id}', 'QueryPmt')->name('payments.query');
    });

    // SCHOLARSHIP PROGRAMS
    Route::resource('Scholarship', ScholarshipController::class);
    Route::resource('Applications', ApplicationsController::class)->only('show');

    Route::controller(ScholarshipController::class)->group(function ()
    {
        Route::post('Scholarship/requirements', 'Req_store')->name('Req.store');
        
    });



});
require __DIR__.'/adminauth.php';