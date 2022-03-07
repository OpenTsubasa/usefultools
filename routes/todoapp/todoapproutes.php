<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoApp\TaskController;

Route::controller(TaskController::class)->group(function () {
    Route::get('/tasks/all', 'index')->name('todoapp.all_tasks');
    Route::get('/tasks/add', 'add')->name('todoapp.add_task');
    Route::post('/tasks/add', 'add_post')->name('todoapp.add_task_post');
    Route::get('/tasks/edit/{id}', 'edit')->name('todoapp.edit_task');
    Route::post('/tasks/edit', 'edit_post')->name('todoapp.edit_task_post');
    Route::post('/tasks/complete', 'complete')->name('todoapp.complete_task');
    Route::post('/tasks/not_complete', 'not_complete')->name('todoapp.not_complete_task');
    Route::post('/tasks/delete', 'delete')->name('todoapp.delete_task');
});
