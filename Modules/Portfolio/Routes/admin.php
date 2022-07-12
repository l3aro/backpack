<?php

use Illuminate\Support\Facades\Route;

Route::get('settings/portfolio', \Modules\Portfolio\Http\Livewire\Setting\Portfolio::class)
    ->name('admin.settings.portfolio');
