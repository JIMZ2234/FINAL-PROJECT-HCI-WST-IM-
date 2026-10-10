<?php

use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::get('/portfolios/{portfolio}/templates', [PortfolioController::class, 'templates'])->name('portfolios.templates');
Route::post('/portfolios/{portfolio}/template', [PortfolioController::class, 'selectTemplate'])->name('portfolios.select');
Route::resource('portfolios', PortfolioController::class);