@extends('layouts.app')
@include('inc.navbar')

@section('content')
<div style="margin-top: 20px;">
@include('inc.messages')
</div>

<a href="/dashboard"><button class="btn btn-primary" style="margin-top: 15px; margin-bottom: 25px">Atgal</button></a>
    <h2 style="margin-bottom: 20px">Naujos užduoties kūrimas</h2>
    {!! Form::open(['action' => 'TasksController@store', 'method' => 'POST']) !!}
    {{-- <div class="form-group row" style="margin-left: 0px">
        {{Form::label('status_id', 'Užduoties statusas:', ['class' => 'col-form-label text-md-right'])}}
        <div class="col-md-3">
        {{Form::select('status_id', ['1' => 'Nauja užduotis', '2' => 'Atlikta užduotis', '3' => 'Sena užduotis'], null, ['class' => 'form-control', 'placeholder' => 'Pasirinkite statusa:'])}}
        </div>  
    </div> --}}
    {{-- {{Form::hidden(['status_id' => '1'])}} --}}
    <div class="form-group">
        {{Form::label('task_name', 'Užduoties pavadinimas')}}
        {{Form::text('task_name', '', ['class' => 'form-control', 'placeholder' => 'Pavadinimas'])}}
    </div>
    <div class="form-group">
            {{Form::label('perform_up_to', 'Užduotį atlikti iki:')}}
            {{Form::date('perform_up_to', '', ['class' => 'form-control', 'placeholder' => 'Atlikti iki:'])}}
    </div>
    <div class="form-group">
            {{Form::label('task_description', 'Užduoties aprašymas')}}
            {{Form::textarea('task_description', '', ['class' => 'form-control', 'placeholder' => 'Aprašymas'])}}
    </div>
        {{Form::submit('Pateikti', ['class' => 'btn btn-success'])}}
    {!! Form::close() !!}
@endsection    

@include('inc.footer')