<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('projects', ProjectController::class);
Route::apiResource('projects.tasks', TaskController::class);
Route::post('/projects/{project}/tasks', [TaskController::class, 'store']);

Route::post('/projects/{project}/tasks', [TaskController::class, 'store']);
Route::get('/projects/{project}/tasks/{task}', [TaskController::class, 'show']);
Route::put('/projects/{project}/tasks/{task}', [TaskController::class, 'update']);
Route::delete('/projects/{project}/tasks/{task}', [TaskController::class, 'destroy']);