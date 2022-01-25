<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin/blog-categories')->middleware('auth:admin')->group(function () {
    Route::get('/', \Modules\Blog\Http\Livewire\Admin\BlogCategory\Index::class)->name('admin.blog-categories.index');
    Route::get('/create', \Modules\Blog\Http\Livewire\Admin\BlogCategory\Create::class)->name('admin.blog-categories.create');
    Route::get('/{blogCategory}/edit', \Modules\Blog\Http\Livewire\Admin\BlogCategory\Edit::class)->name('admin.blog-categories.edit');
    Route::get('/{blogCategory}', \Modules\Blog\Http\Livewire\Admin\BlogCategory\Show::class)->name('admin.blog-categories.show');
});

Route::prefix('admin/blogs')->middleware('auth:admin')->group(function () {
    Route::get('/', \Modules\Blog\Http\Livewire\Admin\Blog\Index::class)->name('admin.blogs.index');
    Route::get('/create', \Modules\Blog\Http\Livewire\Admin\Blog\Create::class)->name('admin.blogs.create');
    Route::get('/{blog}/edit', \Modules\Blog\Http\Livewire\Admin\Blog\Edit::class)->name('admin.blogs.edit');
    Route::get('/{blog}', \Modules\Blog\Http\Livewire\Admin\Blog\Show::class)->name('admin.blogs.show');
});
