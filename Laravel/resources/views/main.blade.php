@extends('__layout')

@section('content')
    <div class="row d-flex">
        @foreach ($objects as $object)
            <div class="col-4 p-2" style="margin-bottom: 100px;">
                <div class="position-relative border p-2" style="height: 300px; width: 100%;">
                    <img src="{{ $object->imageUrl }}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                    <a href="{{ route('flower-objects.show', [$object->id, 'show' => 'image']) }}" class="btn btn-primary w-100 mt-2">
                        {{ $object->title }}
                    </a>
                    @auth
                        <div class="position-absolute top-0 end-0 mt-0 me-2">
                            <a href="{{ route('flower-objects.edit', $object->id) }}" class="btn btn-success">Edit</a>
                            <form action="{{ route('flower-objects.destroy', $object->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn  btn-danger">Delete</button>
                            </form>
                        </div>
                    @endauth
                    <div class="d-flex justify-content-between mt-1">
                        <a href="{{ route('flower-objects.show', [$object->id, 'show' => 'image']) }}" class="btn btn-primary">Картинка</a>
                        <a href="{{ route('flower-objects.show', [$object->id, 'show' => 'info']) }}" class="btn btn-primary">Описание</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
