<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;
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

Auth::routes();

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('urls.index');
    } else {
        return redirect('/login');
    }
});

Route::middleware(['auth'])->group(function () {
    Route::get('/urls', [UrlController::class, 'index'])->name('urls.index');
    Route::get('/urls/create', [UrlController::class, 'create'])->name('urls.create');
    Route::post('/urls', [UrlController::class, 'store'])->name('urls.store');
    Route::get('/urls/{url}/edit', [UrlController::class, 'edit'])->name('urls.edit');
    Route::put('/urls/{url}', [UrlController::class, 'update'])->name('urls.update');
    Route::delete('/urls/{url}', [UrlController::class, 'destroy'])->name('urls.destroy');
});

Route::get('/{short_url}', [UrlController::class, 'redirectURL'])->name('url.redirect');