<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\authTestMiddleware;

Route::post('/login', [AdminController::class, 'login']);

Route::middleware([authTestMiddleware::class])->group(function () {
    Route::get('/division/{name?}', [AdminController::class, 'getdivision']);
    Route::get('/employee/{param?}', [AdminController::class, 'getEmployee']);
    Route::post('/employee', [AdminController::class, 'createEmployee']);
    Route::put('/employee/{id}', [AdminController::class, 'updateEmployee']);
    Route::delete('/employee/{id}', [AdminController::class, 'deleteEmployee']);
    Route::post('/logut', [AdminController::class, 'logout']);
});
