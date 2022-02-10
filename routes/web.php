<?php

use App\Http\Controllers\UserInfoController;
use Illuminate\Support\Facades\Route;



Route::get('/', [UserInfoController::class, 'index']);
Route::post('/fileImport', [UserInfoController::class, 'fileImport']);
Route::get('fileExport', [UserInfoController::class, 'fileExport']);
Route::get('sampleDownload', [UserInfoController::class, 'sampleDownload'])->name('sample');

// Route::get("user-info", [UserInfoController::class, 'index'])->name('user.list');
// Route::get("user", [UserInfoController::class, 'store'])->name('user.add');
// Route::post("user", [UserInfoController::class, 'store'])->name('user.submit');
