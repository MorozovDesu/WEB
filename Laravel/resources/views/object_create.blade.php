@extends('__layout')

@section('content')
    <form action="{{ route("flower-objects.store")}}" method = "POST" enctype="multipart/form-data">
        @csrf
        <input class="form-control mb-2" type="text"  name="title">
        <input class="form-control mb-2" type="text"  name="description">
        <input class="form-control mb-2" type="text"  name="info">
        <input class="form-control mb-2" type="file" name="image">
        <button class="btn btn-primary">Создать</button>

    </form>
@endsection
