<?php

use Illuminate\Support\Facades\Route;

Route::prefix('civilizations')->group(function() {
    Route::get('/', \Modules\Aoe2Notebook\Http\Livewire\Civilization\Index::class)->name('admin.aoe2notebook.civilizations.index');
    Route::get('/create', \Modules\Aoe2Notebook\Http\Livewire\Civilization\Create::class)->name('admin.aoe2notebook.civilizations.create');
    Route::get('/{civilization}/edit', \Modules\Aoe2Notebook\Http\Livewire\Civilization\Edit::class)->name('admin.aoe2notebook.civilizations.edit');
    Route::get('/{civilization}', \Modules\Aoe2Notebook\Http\Livewire\Civilization\Show::class)->name('admin.aoe2notebook.civilizations.show');
});