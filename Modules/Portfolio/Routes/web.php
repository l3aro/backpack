<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \Modules\Portfolio\Http\Livewire\Landing::class)
    ->name('home');