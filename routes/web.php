<?php

use App\Http\Controllers\TodoListController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('lists.index');
    }
    return view('welcome-landing');
});

Auth::routes();

Route::get('/home', function() {
    return redirect()->route('lists.index');
})->middleware('auth')->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('lists', TodoListController::class);
    Route::get('lists/{list}/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('lists/{list}/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('lists/{list}/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('lists/{list}/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::post('lists/{list}/tasks/{task}/toggle', [TaskController::class, 'toggle'])->name('tasks.toggle');
    Route::delete('lists/{list}/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});