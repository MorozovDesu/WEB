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
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'info' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Проверка на тип и размер изображения
            'type' => 'required|string', // Добавлено поле для типа
        ]);

        $object = new FlowerObject;
        $object->title = $request->input("title");
        $object->description = $request->input("description");
        $object->info = $request->input("info");
        $object->type = $request->input("type"); // Добавлено поле для типа

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $object->image = 'images/' . $imageName;
        }

        $object->save();

        return redirect()->route("flower-objects.edit", ["flower_object" => $object->id])
            ->with('success', 'Вы успешно добавили объект');
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
        $object->info = $request->input("info");
        $object->type = $request->input("type"); // Добавляем обновление типа

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $object->image = 'images/' . $imageName;
        }

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

        // Проверка, что у объекта есть изображение перед его удалением
        if ($object->image) {
            // Удаление изображения из хранилища
            Storage::delete($object->image);
        }

        // Удаление объекта из базы данных
        $object->delete();

        return redirect()->route("flower-objects.index")->with('success', 'Объект успешно удален');
    }

}
