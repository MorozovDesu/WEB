@extends('__layout')

@section('content')
    <h1> {{ $object->title }} </h1>
    <div>
        <a href="/flower-objects/{{ $object->id }}?show=image" class="btn btn-primary me-2">Картинка</a>
        <a href="/flower-objects/{{ $object->id }}?show=info" class="btn btn-primary me-2">Описание</a>
    </div>
    @if ($is_image)
        <img src="{{ $object->image }}" alt="" >
    @elseif ($is_info)
        {{ $object->info }}
    @else
        Выберайте, что смотрите
    @endif
@endsection
