<?php

use Illuminate\Support\Facades\Route;

Route::get('project-categories', \Modules\Work\Http\Livewire\ProjectCategory::class)->name('admin.work.categories');
Route::get('projects', \Modules\Work\Http\Livewire\ProjectCategory::class)->name('admin.work.projects');
