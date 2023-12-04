<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/hello', [TestController::class, 'index']);

Route::get('/gibran', function () {
    return view('testing', [
        'name' => 'Gibran',
    ]);
});

Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
Route::get('/register', [UserController::class, 'showUser'])->name('register');


Route::get('/', function () {
    return redirect()->route('login');
})->name('landing');

Route::get('/faqs', [FaqController::class, 'indexUser'])->name('faq.index-user');

Route::middleware(['auth', 'permission:view-dashboard'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'permission:product-list'])->controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('products.index');
});


Route::middleware(['auth', 'permission:product-create'])->controller(ProductController::class)->group(function () {
    Route::get('/products/create', 'create')->name('products.create');
    Route::post('/products', 'store')->name('products.store');
});

Route::middleware(['auth', 'permission:product-edit'])->controller(ProductController::class)->group(function () {
    Route::get('/products/{product}/edit', 'edit')->name('products.edit');
    Route::put('/products/{product}', 'edit')->name('products.update');
});

Route::middleware(['auth', 'permission:product-delete'])->group(function () {
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});

Route::resource('faq', FaqController::class)->except(['create', 'edit'])->middleware(['auth', 'role:admin']);

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'postLogin')->name('login');


    Route::get('/logout', 'logout')->name('logout');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});
