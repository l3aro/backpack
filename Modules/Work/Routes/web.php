<?php

use Illuminate\Support\Facades\Route;
use Modules\Work\Http\Controllers\SearchController;

Route::get('project-categories', \Modules\Work\Http\Livewire\ProjectCategory::class)->name('admin.work.categories');
Route::get('projects', \Modules\Work\Http\Livewire\Project::class)->name('admin.work.projects');

Route::prefix('search')->group(function () {
    Route::get('project-categories', [SearchController::class, 'projectCategory'])->name('admin.work.search.category');
    Route::get('projects', [SearchController::class, 'project'])->name('admin.work.search.project');
});
