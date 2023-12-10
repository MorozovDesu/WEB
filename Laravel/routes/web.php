<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\FlowerObjectController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\FlowerObject;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FlowerObjectController::class, "index"] );

Route::get("/login",[LoginController::class, "show"])->name("login");
Route::post("/login",[LoginController::class, "login"]);
Route::get("/logout",[LoginController::class, "logout"]);

Route::resource("flower-objects",FlowerObjectController::class);
