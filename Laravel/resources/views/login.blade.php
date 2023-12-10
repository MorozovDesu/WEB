@extends('__layout')

@section('content')
    <form action="" method = "POST" >
        @csrf
        <input class="form-control mb-2" placeholder="email" type="text"  name="email">
        <input class="form-control mb-2" placeholder="password" type="password"  name="password">
        <button class="btn btn-primary" type="submit">Войти</button>

    </form>
@endsection