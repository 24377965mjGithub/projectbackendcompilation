<?php

use App\Http\Controllers\UserManagement;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// UserManagement
Route::post('/add-staff', [UserManagement::class, 'addStaff']);
Route::post('/update-name', [UserManagement::class, 'updateName']);
Route::post('/update-email', [UserManagement::class, 'updateEmail']);
Route::post('/update-password', [UserManagement::class, 'updatePassword']);
Route::post('/delete-user', [UserManagement::class, 'deleteUser']);
