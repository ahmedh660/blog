<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\postscontroll;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;

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

Route::get('/', function () {return redirect('/dashboard');});
Route::middleware(['auth'])->group(function ()
{
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::redirect('/', '/login');
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('users', UserController::class);
Route::get('/posts',[postscontroll::class,"index"] )->name('posts.index');
route::get('/posts/create',[postscontroll::class,'create'])->name('posts.create');
route::post('/posts',[postscontroll::class,'store'])->name('posts.store');
route::get('/posts/{post}',[postscontroll::class,'show'])->name('posts.show');
route::get('/posts/{post}/edit',[postscontroll::class,'edit'])->name('posts.edit');
route::put('/posts/{post}',[postscontroll::class,'update'])->name('posts.update');
route::delete('/posts/{post}',[postscontroll::class,'destroy'])->name('posts.destroy');
route::get('/products',[ProductController::class,'index'])->name('products.index');
route::get('/products/create',[ProductController::class,'create'])->name('products.create');
route::post('/products',[ProductController::class,'store'])->name('products.store');
route::get('/sell',[ProductController::class,'sell'])->name('sell.index');
Route::post('/sell', [ProductController::class, 'storeSell'])->name('sell.store');
route::get('/sales',[ProductController::class,'sales'])->name('sales.index');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/products/{id}/add-stock', [ProductController::class, 'addStockForm'])->name('products.addStockForm');
Route::post('/products/{id}/add-stock', [ProductController::class, 'storeStock'])->name('products.storeStock');
Route::get('/stock-entries', [ProductController::class, 'stockEntries'])->name('products.stockEntries');
Route::get('/sales/{id}/print', [ProductController::class, 'print'])->name('sales.print');
});
require __DIR__.'/auth.php';
