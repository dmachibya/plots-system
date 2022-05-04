<?php

use App\Http\Controllers\AuthorityController;
use App\Http\Controllers\UserController;
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
Route::get('/authority', [AuthorityController::class, 'index'])->middleware("admin");
Route::post('/admin/authority/{level}', [AuthorityController::class, 'create'])->middleware("admin");
Route::get('/authority/{level}/{level_id}', [AuthorityController::class, 'view'])->middleware("admin");

Route::get('/admin/users/admin', [UserController::class, 'index'])->middleware(["auth", "admin"]);
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
