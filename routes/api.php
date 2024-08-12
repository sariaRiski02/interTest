<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\authTestMiddleware;

Route::get('/', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'Welcome to API Intern Test',
    ]);
});

Route::fallback(function () {
    return redirect('/');
})->name('fallback');

Route::post('/login', [AdminController::class, 'login'])->middleware(LoginMiddleware::class);
Route::post('/register', [AdminController::class, 'register']);

Route::middleware([authTestMiddleware::class])->group(function () {
    Route::get('/division/{name?}', [AdminController::class, 'getdivision']);
    Route::get('/employee/{param?}', [AdminController::class, 'getEmployee']);
    Route::post('/employee', [AdminController::class, 'createEmployee']);
    Route::put('/employee/{id}', [AdminController::class, 'updateEmployee']);
    Route::delete('/employee/{id}', [AdminController::class, 'deleteEmployee']);
    Route::post('/logout', [AdminController::class, 'logout']);
});
