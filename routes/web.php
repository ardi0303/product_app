<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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

Route::middleware(['auth'])->group(function () {
    // ... rute otentikasi lainnya
    Route::get('/dashboards', [AdminController::class, 'dashboard'])->name('dashboards');
});


Route::get('/home', [HomeController::class,'index'])->middleware(['auth'])->name('home');

Route::get('/dashboards', [AdminController::class,'dashboard'])->middleware(['auth', 'admin'])->name('dashboards');
Route::get('/products', [AdminController::class,'product'])->middleware(['auth', 'admin'])->name('products');
Route::get('/customers', [AdminController::class,'customer'])->middleware(['auth', 'admin'])->name('customers');

Route::get('/add_products', [AdminController::class,'add_product'])->middleware(['auth', 'admin'])->name('add_products');
Route::post('/insert_products', [AdminController::class,'insert_product'])->middleware(['auth', 'admin'])->name('insert_products');

Route::get('/edit_products/{id}', [AdminController::class,'edit_product'])->middleware(['auth', 'admin'])->name('edit_products');
Route::put('/update_products/{id}', [AdminController::class,'update_product'])->middleware(['auth', 'admin'])->name('update_products');

Route::get('/delete_products/{id_product}', [AdminController::class,'delete_product'])->middleware(['auth', 'admin'])->name('delete_products');

Route::get('/edit_user_status/{userId}', [AdminController::class,'editUserStatus'])->middleware(['auth', 'admin'])->name('edit_user_status');

Route::get('/', [UserController::class,'dashboard'])->name('dashboard');



require __DIR__.'/auth.php';
