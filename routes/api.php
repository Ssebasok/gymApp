<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\addUserController;

Route::get('/health', fn() => response()->json([
    'status' => 'ok',
    'time' => now()->toAtomString()
]));

// Rutas de prueba
Route::prefix('test')->group(function () {
    Route::post('/add-user-test', [TestController::class, 'addTestUser']);
    Route::get('/users', [TestController::class, 'getAllUsers']);
    Route::delete('/delete-user', [TestController::class, 'deleteTestUser']);
});


Route::prefix('login')->group(function() {
    Route::post('/add-User', [addUserController::class, 'addUser']);


});