<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\FlowerObject;

class FlowerObjectController extends Controller
{
    function __construct()
    {
        $this->middleware("auth", ["except" => ["index", "show"]]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $objects = FlowerObject::query();
        if ($request->query("type")) {
            $objects = $objects->where("type", $request->query("type"));
        }
        $objects = $objects->get();

        return view('main', [
            "objects" => $objects,
            "title" => "Главная",

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('object_create', [
            "title" => "Создать цветок",

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $object = new FlowerObject;
        $object->title = $request->input("title");
        $object->description = $request->input("description");
        $object->image = $request->file("image")->store("/public/images");
        $object->save();

        return redirect()->route("flower-objects.edit", ["flower_object" => $object->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
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
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $object = FlowerObject::query()
            ->where("id", $id)
            ->first();

        if (!$object) {
            abort(404, 'Объект не найден');
        }
        return view('object_edit', [
            "object" => $object,
            "title" => $object->title,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $object = FlowerObject::query()
            ->where("id", $id)
            ->first();

        $object->title = $request->input("title");
        $object->description = $request->input("description");
        $object->save();

        return redirect()->route("flower-objects.edit", ["flower_object" => $object->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $object = FlowerObject::find($id);

    if (!$object) {
        abort(404, 'Объект не найден');
    }

    // Удаление изображения из хранилища
    Storage::delete($object->image);

    // Удаление объекта из базы данных
    $object->delete();

    return redirect()->route("flower-objects.index")->with('success', 'Объект успешно удален');
    }
}
