<?php

use Illuminate\Support\Facades\Route;

Route::prefix('categories')->group(function () {
    Route::get('/', \Modules\Blog\Http\Livewire\PostCategory\Index::class)->name('admin.blog.categories.index');
    Route::get('/create', \Modules\Blog\Http\Livewire\PostCategory\Create::class)->name('admin.blog.categories.create');
    Route::get('/{postCategory}/edit', \Modules\Blog\Http\Livewire\PostCategory\Edit::class)->name('admin.blog.categories.edit');
    Route::get('/{postCategory}', \Modules\Blog\Http\Livewire\PostCategory\Show::class)->name('admin.blog.categories.show');
});

Route::prefix('posts')->group(function () {
    Route::get('/', \Modules\Blog\Http\Livewire\Post\Index::class)->name('admin.blog.posts.index');
    Route::get('/create', \Modules\Blog\Http\Livewire\Post\Create::class)->name('admin.blog.posts.create');
    Route::get('/{post}/edit', \Modules\Blog\Http\Livewire\Post\Edit::class)->name('admin.blog.posts.edit');
    Route::get('/{post}', \Modules\Blog\Http\Livewire\Post\Show::class)->name('admin.blog.posts.show');
});
