<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\CategoryCrud;
use App\Livewire\Admin\ProductCrud;
use App\Livewire\Admin\SubcategoryCrud;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\ProductDetail;
use App\Livewire\ProductList;

// Auth Routes
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/');
})->name('logout');

// Public Routes
Route::get('/', ProductList::class);
Route::get('/product/{id}', ProductDetail::class);

// Admin Routes
Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::get('/products', ProductCrud::class)->name('admin.products');
        Route::get('/categories', CategoryCrud::class)->name('admin.categories');
        Route::get('/subcategories', SubcategoryCrud::class)->name('admin.subcategories');
    });
