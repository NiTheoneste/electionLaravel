<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlagController;
use App\Http\Controllers\GovernorController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\PresElectorController;
use App\Http\Controllers\SenatorController;
use App\Http\Controllers\StateController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/state', [StateController::class, 'showHome']);
Route::get('/state/add', [StateController::class, 'showAddPage']);
Route::post('/state/create', [StateController::class, 'createAndAdd'])->name('state.add');
Route::get('/state/edit{pk}', [StateController::class, 'showEditPage'])->name('state.edit');
Route::put('state/update{pk}', [StateController::class, 'update'])->name('state.update');
Route::delete('/state/delete{pk}', [StateController::class, 'delete'])->name('state.delete');

Route::get('/flag', [FlagController::class, 'showHome']);
Route::get('/flag/add', [FlagController::class, 'showAddPage']);
Route::post('/flag/create', [FlagController::class, 'createAndAdd'])->name('flag.add');
Route::get('/flag/edit{pk}', [FlagController::class, 'showEditPage'])->name('flag.edit');
Route::put('/flag/update{pk}', [FlagController::class, 'update'])->name('flag.update');
Route::delete('/flag/delete{pk}', [FlagController::class, 'delete'])->name('flag.delete');

Route::get('/party', [PartyController::class, 'showHome']);
Route::get('/party/add', [PartyController::class, 'showAddPage']);
Route::post('party/create', [PartyController::class, 'createAndAdd'])->name('party.add');
Route::get('/party/edit{pk}', [PartyController::class, 'showEditPage'])->name('party.edit');
Route::put('/party/update{pk}', [PartyController::class, 'update'])->name('party.update');
Route::delete('/party/delete{pk}', [PartyController::class, 'delete'])->name('party.delete');

Route::get('/governor', [GovernorController::class, 'showHome']);
Route::get('/governor/add', [GovernorController::class, 'showAddPage']);
Route::post('/governor/create', [GovernorController::class, 'createAndAdd'])->name('governor.add');
Route::get('/governor/edit{pk}', [GovernorController::class, 'showEditPage'])->name('governor.edit');
Route::put('/governor/update{pk}', [GovernorController::class, 'update'])->name('governor.update');
Route::delete('/governor/delete{pk}', [GovernorController::class, 'delete'])->name('governor.delete');

// The dynamic routes hav to come after the static routes
Route::get('/senator', [SenatorController::class, 'showHome']);
Route::get('/senator/add', [SenatorController::class, 'showAddPage']);
Route::post('/senator/create', [SenatorController::class, 'createAndAdd'])->name('senator.add');
Route::get('/senator/edit/{pk}', [SenatorController::class, 'showEditPage'])->name('senator.edit');
Route::put('/senator/update/{pk}', [SenatorController::class, 'update'])->name('senator.update');
Route::delete('/senator/delete/{pk}', [SenatorController::class, 'delete'])->name('senator.delete');

Route::get('/presElector', [PresElectorController::class, 'showHome']);
Route::get('/presElector/add', [PresElectorController::class, 'showAddPage']);
Route::post('/presElector/create', [PresElectorController::class, 'createAndAdd'])->name('presElector.add');
Route::get('/presElector/edit{pk}', [PresElectorController::class, 'showEditPage'])->name('presElector.edit');
Route::put('/presElector/update{pk}', [PresElectorController::class, 'update'])->name('presElector.update');
Route::delete('/presElector/delete{pk}', [PresElectorController::class, 'delete'])->name('presElector.delete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
