<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUsersController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/role',function (){
    $user=App\Models\User::find(1);
    return $user->role;
});
Route::resource('/admin/users',App\Http\Controllers\AdminUsersController::class);

Route::get('/admin',function (){
    return view('admin.index');
});
