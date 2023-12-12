@extends('__layout')

@section('content')
    <form action="{{ route('flower-objects.update', ['flower_object' => $object->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("put")
        <div class="mb-3">
            <label class="form-label">Название</label>
            <input class="form-control mb-2" type="text" value="{{ $object->title }}" name="title">
        </div>
        <div class="mb-3">
            <label class="form-label">Краткое описание</label>
            <input class="form-control mb-2" type="text" value="{{ $object->description }}" name="description">
        </div>
        <div class="mb-3">
            <label class="form-label">Полное описание</label>
            <textarea class="form-control mb-2" name="info" rows="5">{{ $object->info }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Тип</label>
            <select class="form-control" name="type">
                <option value="кустовые" {{ $object->type == 'кустовые' ? 'selected' : '' }}>Кустовые</option>
                <option value="одиночные" {{ $object->type == 'одиночные' ? 'selected' : '' }}>Одиночные</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Картинка</label>
            <input class="form-control mb-2" type="file" name="image">
        </div>
        <button class="btn btn-primary">Обновить</button>
    </form>
@endsection
