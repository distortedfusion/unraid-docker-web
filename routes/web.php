<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DockerImageController;
use Illuminate\Support\Facades\Route;

Route::get('/', DashboardController::class)->name('dashboard');
Route::get('/docker/images/{image}', DockerImageController::class)->name('docker.image');
