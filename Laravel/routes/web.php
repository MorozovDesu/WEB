<?php

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

Route::get('/', function (Request $request) {
    $objects = FlowerObject::query();
    if ($request->query("type")) {
        $objects = $objects->where("type", $request->query("type"));
    }
    $objects = $objects->get();

    return view('main', [
        "objects" => $objects,
        "title" => "Главная",

    ]);
});
Route::get('/flower-objects/{id}', function (Request $request, $id) {
    // dd($request);
    $objects = FlowerObject::query()
        ->where("id", $id)
        ->first();
    

    return view('object', [
        "object" => $objects,
        "title" => $objects->title,
        // "image" => $image,
        "is_image" => $request->query("show") == 'image',
        "is_info" => $request->query("show") == 'info',

    ]);
})->name("flower-objects")->whereNumber('id');

Route::get('/flower-objects/{id}/edit', function (Request $request, $id) {
    $object = FlowerObject::query()
        ->where("id", $id)
        ->first();

    return view('object_edit', [
        "object" => $object,
        "title" => $object->title,

    ]);
})->name("flower-objects.edit")->whereNumber('id');

Route::post('/flower-objects/{id}', function (Request $request, $id) {
    $object = FlowerObject::query()
        ->where("id", $id)
        ->first();

    $object->title = $request->input("title");
    $object->description = $request->input("description");
    $object->save();

    return redirect()->route("flower-objects.edit", ["id" => $object->id]);
})->name("flower-objects.update")->whereNumber('id');


Route::get('/flower-objects/create', function (Request $request) {
    return view('object_create', [
        "title" => "Создать цветок",

    ]);
})->name("flower-objects.create_form");

Route::post('/flower-objects', function (Request $request) {
    $object = new FlowerObject;
    $object->title = $request->input("title");
    $object->description = $request->input("description");
    $object->image = $request->file("image")->store("/public/images");
    $object->save();

    return redirect()->route("flower-objects.edit", ["id" => $object->id]);
})->name("flower-objects.create");
