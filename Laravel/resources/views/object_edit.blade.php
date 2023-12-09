@extends('__layout')

@section('content')
    <form action="{{ route('flower-objects.update', ['id' => $object->id]) }}" method = "POST" enctype="multipart/form-data">
        @csrf
        <input class="form-control mb-2" type="text" value="{{ $object->title }}" name="title">
        <input class="form-control mb-2" type="text" value="{{ $object->description }}" name="description">
        <input class="form-control mb-2" type="file" name="image">
        <button class="btn btn-primary">Обновить</button>

    </form>
@endsection
