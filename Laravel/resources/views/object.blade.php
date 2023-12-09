@extends('__layout')

@section('content')
    <h1> {{ $object->title }} </h1>
    <div>
        <a href="/flower-objects/{{ $object->id }}?show=image" @class([
            'btn',
            'me-2',
            'btn-primary' => $is_image,
            'btn-link' => !$is_image,
        ])>Картинка</a>
        <a href="/flower-objects/{{ $object->id }}?show=info" @class([
            'btn',
            'me-2',
            'btn-primary' => $is_info,
            'btn-link' => !$is_info,
        ])>Описание</a>
    </div>
    @if ($is_image)
        <img src="{{ $object->image }}" alt="">
    @elseif ($is_info)
        {{ $object->info }}
    @else
        Выберайте, что смотрите
    @endif
@endsection
