<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;


Route::redirect('/', 'list');
Route::get('list', [BlogController::class, 'list'])->name('listBlog');
Route::post('create', [BlogController::class, 'create'])->name('createBlog');
Route::get('delete/{id}', [BlogController::class, 'delete'])->name('deleteBlog');
Route::get('updatePage/{id}', [BlogController::class, 'updatePage'])->name('updatePage');
Route::post('update/{id}', [BlogController::class, 'updateBlog'])->name('updateBlog');
