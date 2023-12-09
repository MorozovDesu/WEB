@extends('__layout')

@section('content')
    <div class="row">
        @foreach ($objects as $object)
            <div class="col-4 p-2">
                <div class="d-flex flex-column border p-2">
                    <img src="{{ $object->imageUrl }}" alt="" sizes="max-width: 100%; height: 200px; object-fit: cover;">
                    <a href="/flower-objects/{{ $object->id }}" class="btn btn-primary w-100 mt-3">
                        {{ $object->title }}
                    </a>
                    <div class="d-flex justify-content-between mt-3">
                        <button class="btn btn-primary">Картинка</button>
                        <button class="btn btn-primary">Описание</button>
                        <a href="{{ route('flower-objects.edit', $object->id) }}" class="btn btn-success">Edit</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
