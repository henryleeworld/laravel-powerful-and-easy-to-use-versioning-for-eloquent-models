<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('users/version/', [UsersController::class, 'getVersion']);
