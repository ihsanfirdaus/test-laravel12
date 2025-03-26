<?php

use App\Http\Controllers\Api\ChecklistController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use App\Http\Middleware\JwtMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

// Route::middleware([JwtMiddleware::class])->group(function() {
// });
Route::get('/checklist', [ChecklistController::class, 'index']);
Route::post('/checklist', [ChecklistController::class, 'create']);
Route::delete('/checklist/{id}', [ChecklistController::class, 'delete']);
Route::get('/checklist/{id}/item', [ChecklistController::class, 'show']);
Route::post('/checklist/{id}/item', [ChecklistController::class, 'createItem']);
Route::get('/checklist/{id}/item/{itemId}', [ChecklistController::class, 'showItem']);
Route::put('/checklist/{id}/item/{itemId}', [ChecklistController::class, 'updateItem']);
Route::delete('/checklist/{id}/item/{itemId}', [ChecklistController::class, 'deleteItem']);
Route::put('/checklist/{id}/item/rename/{itemId}', [ChecklistController::class, 'renameItem']);
// Route::get('/posts', [PostController::class, 'index']);
// Route::post('/posts', [PostController::class, 'create']);
