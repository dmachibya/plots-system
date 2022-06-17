<?php

use App\Http\Controllers\AuthorityController;
use App\Http\Controllers\KiwanjaController;
use App\Http\Controllers\UserController;
use App\Models\Authority;
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
    return redirect("dashboard");
});
Route::get('/dashboard', function () {
    return view('home');
})->middleware("auth")->name('dashboard');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});

Route::post('/admin/users/admin/create', [UserController::class, 'create'])->middleware("admin");
Route::get('/authority/edit/{level}/{id}', [AuthorityController::class, 'edit'])->middleware("admin");
Route::post('/authority/update/{id}', [AuthorityController::class, 'update'])->middleware("admin");
Route::get('/authority/delete/{id}', [AuthorityController::class, 'delete'])->middleware("admin");
Route::get('/authority/{id}', [AuthorityController::class, 'index'])->middleware("admin");
Route::post('/admin/authority/{level}', [AuthorityController::class, 'create'])->middleware("admin");
Route::get('/authority/{level}/{level_id}', [AuthorityController::class, 'view'])->middleware("admin");
Route::get('/kiwanja/{id}', [KiwanjaController::class, 'view'])->middleware("auth");
Route::post('/admin/kiwanja/sell/{id}', [KiwanjaController::class, 'sell'])->middleware("admin");
Route::get('/admin/kiwanja/sold/{id}', [KiwanjaController::class, 'sold'])->middleware("admin");
Route::get('/plots', [AuthorityController::class, 'plots']);

Route::get('/users', [UserController::class, 'users'])->middleware('admin');
Route::get('/users/{id}', [UserController::class, 'view'])->middleware('admin');
Route::get('/users/delete/{id}', [UserController::class, 'delete'])->middleware('admin');

Route::get('/admin/users/admin', [UserController::class, 'index'])->middleware(["auth", "admin"]);
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
