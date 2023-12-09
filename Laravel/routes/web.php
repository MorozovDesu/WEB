<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function (Request $request) {
    // $objects = FlowerObject::all();
    $objects = FlowerObject::query();
    if($request->query("type")){
        $objects = $objects->where("type", $request->query("type"));
    }
    $objects = $objects->get();

    // dd($objects);

    return view('main', [
        "objects" => $objects,
        "title" => "Главная",

    ]);
});
Route::get('/flower-objects/{id}', function (Request $request,$id) {
    // $objects = DB::selectOne("SELECT * FROM flower_objects WHERE id =?", [$id] );
    // dd($request);
    $objects = FlowerObject::query()
        ->where("id",$id)
        ->first();
    

    return view('object', [
        "object" => $objects,
        "title" => $objects->title,
        "is_image" => $request->query("show") == 'image',
        "is_info" => $request->query("show") == 'info',

    ]);
})->name("flower-objects");

