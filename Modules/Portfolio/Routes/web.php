<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \Modules\Portfolio\Http\Livewire\Landing::class)
    ->name('home');
Route::get('blog', \Modules\Portfolio\Http\Livewire\BlogList::class)
    ->name('blogs.index');
Route::get('blog/{detail}', \Modules\Portfolio\Http\Livewire\BlogDetail::class)
    ->name('blogs.show');
