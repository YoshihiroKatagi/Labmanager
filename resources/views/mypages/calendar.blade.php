
@extends('layouts.app')

@section('content')
    <a href="/">戻る</a>
    <h1>カレンダー</h1>
    @foreach($events as $event)
        <p>予定：{{ $event['summary'] }}</p>
        <p>{{ $event['start'] }} ~ {{ $event['end'] }}</p>
        <br>
    @endforeach
@endsection