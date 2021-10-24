<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\AssignController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\IklanController;
use App\Http\Controllers\Admin\PertandinganController;
use App\Http\Controllers\Admin\LatihanController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\PendaftaranController;
use App\Http\Controllers\Admin\LogoController;
use App\Http\Controllers\Admin\SponsorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\PasswordController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\FrontendController;




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

// Route::get('/', function () {
    //     // $role = Role::find(2);
    //     // $role->givePermissionTo('manajemen permissions');
    //     return view('welcome');
    // });

    // Frontend
    Route::get('/', [FrontendController::class, 'index']);
    Route::get('/daftar-anggota', [FrontendController::class, 'anggota'])->name('daftar-anggota');
    Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
    Route::get('/blog/detail/{slug}', [FrontendController::class, 'detail'])->name('detail');
    Route::get('/jadwal-pertandingan-latihan', [FrontendController::class, 'jadwal'])->name('jadwal-pertandingan-latihan');
    Route::get('/galeri', [FrontendController::class, 'galeri'])->name('galeri');
    Route::get('/about', [FrontendController::class, 'about'])->name('about');
    Route::get('/store', [FrontendController::class, 'store'])->name('store');


    Auth::routes(['verify'=>true]);

    Route::middleware(['has.role'])->prefix('home')->middleware('auth')->group(function() {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::prefix('admin')->group(function(){
            Route::prefix('manajemen-user')->middleware('permission:manajemen permission', 'verified' )->group(function(){
                // Role
                Route::get('roles',[RoleController::class, 'index'])->name('roles.index');
                Route::post('roles/create',[RoleController::class, 'store'])->name('roles.create');
                Route::get('roles/{role}/edit',[RoleController::class, 'edit'])->name('roles.edit');
                Route::put('roles/{role}/edit',[RoleController::class, 'update']);
                // Permission
                Route::get('', [PermissionController::class, 'index'])->name('permissions.index');
                Route::post('create', [PermissionController::class, 'store'])->name('permissions.create');
                Route::get('{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
                Route::put('{permission}/edit', [PermissionController::class, 'update']);
                // Assign Permission
                Route::get('assignable',[AssignController::class, 'create'])->name('assign.create');
                Route::post('assignable',[AssignController::class, 'store']);
                Route::get('assignable/{role}/edit',[AssignController::class, 'edit'])->name('assign.edit');
                Route::put('assignable/{role}/edit',[AssignController::class, 'update']);
                // Permission to User
                Route::get('assign/user',[UserController::class, 'create'])->name('assign.user.create');
                Route::post('assign/user',[UserController::class, 'store']);
                Route::get('assign/{user}/user',[UserController::class, 'edit'])->name('assign.user.edit');
                Route::put('assign/{user}/user',[UserController::class, 'update']);
                // Setting user
                Route::resource('users', PenggunaController::class);
            });
        });
    });
    Route::middleware(['has.role'])->prefix('home/admin')->middleware('auth', 'verified')->group(function() {
        Route::middleware('permission:slide permission')->group(function(){
            // Slide
            Route::resource('slide', SlideController::class);
        });
    });
    Route::middleware(['has.role'])->prefix('home/admin')->middleware('auth', 'verified')->group(function() {
        Route::middleware('permission:galeri permission')->group(function(){
            // Galeri
            Route::resource('galeri', GaleriController::class);
        });
    });
    Route::middleware(['has.role'])->prefix('home/admin')->middleware('auth', 'verified')->group(function() {
        Route::middleware('permission:blog permission')->group(function(){
            // Blog
            Route::resource('blog', BlogController::class);
        });
    });
    Route::middleware(['has.role'])->prefix('home/admin')->middleware('auth', 'verified')->group(function() {
        Route::middleware('permission:iklan permission')->group(function(){
            // iklan
            Route::resource('iklan', IklanController::class);
        });
    });
    Route::middleware(['has.role'])->prefix('home/admin')->middleware('auth', 'verified')->group(function() {
        Route::middleware('permission:jadwal permission')->group(function(){
            // Jadwal pertandingan
            Route::resource('pertandingan', PertandinganController::class);
            // Jadwal latihan
            Route::resource('latihan', LatihanController::class);
        });
    });
    Route::middleware(['has.role'])->prefix('home/admin')->middleware('auth', 'verified')->group(function() {
        Route::middleware('permission:store permission')->group(function(){
            // store
            Route::resource('store', StoreController::class);
        });
    });
    Route::middleware(['has.role'])->prefix('home/admin')->middleware('auth', 'verified')->group(function() {
        Route::middleware('permission:anggota permission')->group(function(){
            // daftar anggota
            Route::resource('anggota', AnggotaController::class);
            // cetak PDF anggota
            Route::get('cetak_pdf', [AnggotaController::class, 'cetak_pdf'])->name('anggota.cetakpdf');
            // cetak Excel anggota
            Route::get('cetak_excel', [AnggotaController::class, 'cetak_excel'])->name('anggota.cetakexcel');

        });
    });
    Route::middleware(['has.role'])->prefix('home/admin')->middleware('auth', 'verified')->group(function() {
        Route::middleware('permission:setting permission')->group(function(){
            // settings about
            Route::resource('about', AboutController::class);
            // settings about
            Route::resource('footer', FooterController::class);
            // settings pendaftaran
            Route::resource('pendaftaran', PendaftaranController::class);
            // settings logo
            Route::resource('logo', LogoController::class);
            // settings Sponsor
            Route::resource('sponsor', SponsorController::class);
        });
    });


    // Profile All
    Route::prefix('home')->middleware('auth', 'verified')->group(function() {
        Route::resource('profile', ProfileController::class);
        Route::get('password/edit', [PasswordController::class, 'edit'])->name('password.edit');
        Route::put('password/update', [PasswordController::class, 'update'])->name('password.update');
    });


