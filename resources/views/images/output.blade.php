@extends('layouts.app')

@section('content')
    <br>
    @foreach ($images as $image)
        <img src="{{ $image['image_path'] }}">
        <p>{{ $image->description }}</p>
        <br>
    @endforeach
@endsection