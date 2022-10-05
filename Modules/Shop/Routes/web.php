<?php

use Illuminate\Support\Facades\Route;

Route::prefix('categories')->group(function () {
    Route::get('', \Modules\Shop\Http\Livewire\ProductCategory\Index::class)->name('admin.shop.categories.index');
});
