<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin/post-categories')->middleware('auth:admin')->group(function () {
    Route::get('/', \Modules\Blog\Http\Livewire\PostCategory\Index::class)->name('admin.post-categories.index');
    Route::get('/create', \Modules\Blog\Http\Livewire\PostCategory\Create::class)->name('admin.post-categories.create');
    Route::get('/{postCategory}/edit', \Modules\Blog\Http\Livewire\PostCategory\Edit::class)->name('admin.post-categories.edit');
    Route::get('/{postCategory}', \Modules\Blog\Http\Livewire\PostCategory\Show::class)->name('admin.post-categories.show');
});

Route::prefix('admin/posts')->middleware('auth:admin')->group(function () {
    Route::get('/', \Modules\Blog\Http\Livewire\Post\Index::class)->name('admin.posts.index');
    Route::get('/create', \Modules\Blog\Http\Livewire\Post\Create::class)->name('admin.posts.create');
    Route::get('/{post}/edit', \Modules\Blog\Http\Livewire\Post\Edit::class)->name('admin.posts.edit');
    Route::get('/{post}', \Modules\Blog\Http\Livewire\Post\Show::class)->name('admin.posts.show');
});
