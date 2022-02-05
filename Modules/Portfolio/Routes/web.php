<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \Modules\Portfolio\Http\Livewire\Landing::class)
    ->name('portfolio.home');
Route::get('blog', \Modules\Portfolio\Http\Livewire\BlogList::class)
    ->name('portfolio.blogs.index');
Route::get('blog/{detail}', \Modules\Portfolio\Http\Livewire\BlogDetail::class)
    ->name('portfolio.blogs.show');
