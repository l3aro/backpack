<?php

use Illuminate\Support\Facades\Route;

Route::get('switch-locale/{$locale}', \Modules\Portfolio\Http\Controllers\LocaleController::class)
    ->name('portfolio.switch-locale');
