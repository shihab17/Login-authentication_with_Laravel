<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\basicController;
use App\Http\Controllers\NoticeController;
use Illuminate\Support\Facades\Auth;

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
//     return view('welcome');
// });
// Route::get('/', function () {
//     return 'hello AIUB';
// });
// Route::get('/cs', function () {
//     return view('cs');
// // });
Route::get('/', [basicController::class, 'index']);
Route::get('/cs', [basicController::class, 'cs']);
Route::get('/eee', [basicController::class, 'eee']);
Route::get('/research', [basicController::class, 'research']);
// Route::get('/notice', [basicController::class, 'notice']);
Route::resource('notice', NoticeController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
