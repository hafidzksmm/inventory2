<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\inventoriController;
use App\Http\Controllers\asetController;
use App\Http\Controllers\proyekController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/signin', function () {
    return view('account-pages.signin');
})->name('signin');

Route::get('/sign-in', [LoginController::class, 'create'])
    ->middleware('guest')
    ->name('sign-in');

Route::post('/sign-in', [LoginController::class, 'store'])
    ->middleware('guest');

Route::post('/logout', [LoginController::class, 'destroy'])
    
    ->name('logout');

Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'store'])
    ->middleware('guest');

Route::get('/laravel-examples/user-profile', [ProfileController::class, 'index'])->name('users.profile');
Route::put('/laravel-examples/user-profile/update', [ProfileController::class, 'update'])->name('users.update');
Route::get('/laravel-examples/users-management', [UserController::class, 'index'])->name('users-management');



//invetori mtt//
Route::middleware(['auth'])->group(function () {


Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', [App\Http\Controllers\dashboardController::class, 'index'])->name('dashboard');

route::get('/inventori',[inventoriController::class,'ws'])->name('view-ws');
route::post('/inventori/add',[inventoriController::class,'store'])->name('ws-store');
route::put('/inventori/{id}',[inventoriController::class,'update'])->name('ws.update');
route::delete('/inventori/{id}',[inventoriController::class,'destroy'])->name('ws.hapus');
Route::post('/inventori/import', [inventoriController::class, 'import'])->name('inventori.import');
Route::get('/inventori/export', [inventoriController::class, 'export'])->name('inventori.export');
Route::get('/inventori/filter', [inventoriController::class, 'filter'])->name('ws.filter');
Route::get('/inventori/get-detail', [inventoriController::class, 'getDetail'])->name('ws.getDetail');

//aset jual
route::get('/inventory-aset-jual',[asetController::class,'aset'])->name('view-aset');
route::post('/inventory-aset-jual/add',[asetController::class,'store'])->name('aset-store');
route::put('/inventory-aset-jual/{id}',[asetController::class,'update'])->name('aset.update');
route::delete('/inventory-aset-jual/{id}',[asetController::class,'destroy'])->name('aset.hapus');
Route::post('/inventory-aset-jual/import', [asetController::class, 'import'])->name('asetjual.import');
Route::get('/inventory-aset-jual/export', [asetController::class, 'export'])->name('asetjual.export');
Route::get('/inventory-aset/filter', [AsetController::class, 'filter'])->name('aset.filter');
Route::get('/inventory-aset/get-detail', [AsetController::class, 'getDetail'])->name('aset.getDetail');

//project
route::get('/inventory-projek',[proyekController::class,'projek'])->name('view-projek');
route::post('/inventory-projek/add',[proyekController::class,'store'])->name('projek-store');
route::put('/inventory-projek/{id}',[proyekController::class,'update'])->name('projek.update');
route::delete('/inventory-projek/{id}',[proyekController::class,'destroy'])->name('projek.hapus');
Route::post('/inventory-projekt/import', [proyekController::class, 'import'])->name('projeks.import');
Route::get('/inventory-projek/export', [proyekController::class, 'export'])->name('projeks.export');
route::get('/inventoty-projek/filter', [proyekController::class, 'filter'])->name('projek.filter');
Route::get('/inventory-projek/get-detail', [proyekController::class, 'getDetail'])->name('projek.getDetail');
});