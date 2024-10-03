<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\SupplierCategoriesController;
use App\Http\Controllers\SuppliersControllers;
use App\Http\Resources\SuppliersResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/supplier-categories', [SupplierCategoriesController::class, 'index']);
Route::post('/supplier-categories', [SupplierCategoriesController::class, 'store']);
Route::patch('/supplier-categories/{id}', [SupplierCategoriesController::class, 'update']);
Route::delete('/supplier-categories/{id}', [SupplierCategoriesController::class, 'destroy']);

Route::get('/suppliers', [SuppliersControllers::class, 'index']);
Route::post('/suppliers', [SuppliersControllers::class, 'store']);
Route::patch('/suppliers/{id}', [SuppliersControllers::class, 'update']);
Route::delete('/suppliers/{id}', [SuppliersControllers::class, 'destroy']);

Route::post('/login', [AuthenticationController::class, 'login']);