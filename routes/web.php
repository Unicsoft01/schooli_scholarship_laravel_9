<?php

use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ScholarshipController;

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

    Route::resource('Scholarship', ScholarshipController::class);
    Route::resource('Applications', ApplicationsController::class);

    Route::controller(ApplicationsController::class)->group(function (){
        Route::get('Applications/createApp/{id}', 'CreateApplication')->name('app.create');
        Route::get('myApps', 'MyApplications')->name('my.applications');
        // Route::post('/contact/Store', 'ContactStore')->name('contact.store');
    });


});


require __DIR__.'/auth.php';
