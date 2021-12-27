<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:admin')->prefix('me')->group(function () {
    Route::get('profile', \Modules\Core\Http\Livewire\Admin\Me\Profile\Index::class)
        ->name('admin.me.profile.index');
    Route::get('profile/edit', \Modules\Core\Http\Livewire\Admin\Me\Profile\Edit::class)
        ->name('admin.me.profile.edit');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/', \Modules\Core\Http\Livewire\Admin\Dashboard::class)
        ->name('admin.dashboard');

    Route::get('users', \Modules\Core\Http\Livewire\Admin\User\Index::class)
        ->name('admin.users.index');
    Route::get('users/create', \Modules\Core\Http\Livewire\Admin\User\Create::class)
        ->name('admin.users.create');
    Route::get('users/{user}', \Modules\Core\Http\Livewire\Admin\User\Show::class)
        ->name('admin.users.show');
    Route::get('users/{user}/edit', \Modules\Core\Http\Livewire\Admin\User\Edit::class)
        ->name('admin.users.edit');

    Route::get('settings/general', \Modules\Core\Http\Livewire\Admin\Setting\General::class)
        ->name('admin.settings.general');
    Route::get('settings/home', \Modules\Core\Http\Livewire\Admin\Setting\Home::class)
        ->name('admin.settings.home');
    Route::get('settings/about', \Modules\Core\Http\Livewire\Admin\Setting\About::class)
        ->name('admin.settings.about');
});

Route::middleware('guest:admin')->group(function () {
    Route::get('login', \Modules\Core\Http\Livewire\Admin\Auth\Login::class)
        ->name('admin.login');
    Route::get('password/reset', \Modules\Core\Http\Livewire\Admin\Auth\ForgotPassword::class)
        ->name('admin.password.request');
    Route::get('password/reset/{token}', \Modules\Core\Http\Livewire\Admin\Auth\ResetPassword::class)
        ->name('admin.password.reset');
});


Route::middleware('auth:admin')->group(function () {
    Route::any('adminer', [\Aranyasen\LaravelAdminer\AdminerAutologinController::class, 'index']);
});
