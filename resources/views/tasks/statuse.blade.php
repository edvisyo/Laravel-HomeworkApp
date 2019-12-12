@extends('layouts.app')

@section('content')
    @if(count($statuses) > 0)
        @foreach($statuses as $status)
        <h5>{{$status->name}}</h5>
    @endforeach
    @else
        <p>Nera statusu</p>
    @endif
@endsection    