<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::patch('user/update', [HomeController::class, 'updateUser'])->name('user.update');
Route::patch('work-experience/store', [HomeController::class, 'storeWorkExperience'])->name('work-experience.store');
Route::patch('organization-association/store', [HomeController::class, 'organizationAssociationStore'])->name('organization-association.store');
