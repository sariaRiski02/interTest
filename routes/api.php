<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\authTestMiddleware;

Route::post('/login', [AdminController::class, 'login']);

Route::middleware([authTestMiddleware::class])->group(function () {
    Route::get('/divition/{name}', [AdminController::class, 'getDivition']);
});
