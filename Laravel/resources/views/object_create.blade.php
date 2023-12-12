@extends('__layout')

@section('content')
    <form action="{{ route("flower-objects.store") }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Название</label>
            <input class="form-control mb-2" type="text" name="title">
        </div>
        <div class="mb-3">
            <label class="form-label">Краткое описание</label>
            <input class="form-control mb-2" type="text" name="description">
        </div>
        <div class="mb-3">
            <label class="form-label">Полное описание</label>
            <textarea class="form-control mb-2" name="info" rows="5"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Тип</label>
            <select class="form-control" name="type">
                <option value="кустовые">Кустовые</option>
                <option value="одиночные">Одиночные</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Картинка</label>
            <input class="form-control mb-2" type="file" name="image">
        </div>
        <button class="btn btn-primary">Создать</button>
    </form>
@endsection
