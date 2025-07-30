<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DemoRequestController;
use App\Http\Controllers\ProjectSayogiController;
use Illuminate\Support\Facades\Route;

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
//public Route
Route::get('/', function () {
    return view('welcome');
})->name('index');
Route::get('/about-us', function () {
    return view('about-us');
})->name('about');
Route::get('/terms-&-conditions', function () {
    return view('terms');
})->name('term');
Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');


Route::get('/admin/login', function () {
    return view('adminlogin');
});

Route::post('/demo-request/store', [DemoRequestController::class, 'demostore'])->name('demorequest.store');
Route::post('/adminlogin', [AdminController::class, 'adminlogin'])->name('admin.login');

//admin Route
Route::middleware(['auth.admin'])->group(function () {
    Route::post('/logout', [AdminController::class, 'adminlogout'])
        ->name('admin.logout');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/demo-list', [DemoRequestController::class, 'displaydemo'])->name('demorequest.index');
    Route::post('/dashboard/demo-list/statusupdate/{id}', [DemoRequestController::class, 'statusupdate'])->name('demorequest.statusupdate');
    Route::delete('/dashboard/demo-list/delete/{id}', [DemoRequestController::class, 'destroy'])->name('demorequest.destroy');
    Route::post('/dashboard/demo-list/updateday/{id}', [DemoRequestController::class, 'updateday'])->name('demorequest.updateday');
    Route::post('/dashboard/demo-list/update/{id}', [DemoRequestController::class, 'demoupdate'])->name('demorequest.update');
    Route::post('/dashboard/demo-list/decline/{id}', [DemoRequestController::class, 'decline'])->name('tenants.decline');

});
