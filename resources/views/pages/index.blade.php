@extends('layouts.app')

@section('content')
    {{-- <h1>{{$title}}</h1> --}}
    <div class="jumbotron text-center" style="margin-top: 45px">
        <h1><?php echo $title ?></h1>
        <hr>
        <p><a class="btn btn-primary btn-lg" role="button" href="{{ route('login') }}">{{ __('Prisijungti') }}</a> <a class="btn btn-success btn-lg" role="button" href="{{ route('register') }}">{{ __('Registruotis') }}</a></p>
    </div>
@endsection 


