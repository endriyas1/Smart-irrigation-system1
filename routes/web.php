<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PermissionsController;

Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['guest']], function () {
  Route::get('/register', [HomeController::class, 'register'])->name('auth.register');
  Route::post('/register', [LoginController::class, 'register']);
  Route::get('/forgot-password', [HomeController::class, 'forgotPassword'])->name('auth.forgot-password');
  Route::post('/login', [LoginController::class, 'login'])->name('auth.login');
});
Route::group(['middleware' => ['auth', 'permission']], function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

  Route::resource('devices', DeviceController::class);
  Route::resource('plants', PlantController::class);
  Route::resource('{device}/settings', SettingController::class);
  Route::resource('{device}/sensors', SensorController::class);

  Route::resource('users', UsersController::class);
  Route::resource('roles', RolesController::class);
  Route::resource('permissions', PermissionsController::class);
});
