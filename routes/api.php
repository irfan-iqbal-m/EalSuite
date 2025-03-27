<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UnifiedApiController;

Route::get('/list', [UnifiedApiController::class, 'list']);
Route::post('/create', [UnifiedApiController::class, 'create']);