@extends('layouts.app')
@include('inc.navbar')

@section('content')
@include('inc.messages')

<a href="/dashboard"><button class="btn btn-primary" style="margin-top: 15px; margin-bottom: 35px">Atgal</button></a>
    <h3>Užduoties redagavimas</h3>
    {!! Form::open(['action' => ['TasksController@update', $task->id], 'method' => 'POST']) !!}
    <div class="form-group row" style="margin-left: 0px">
        {{Form::label('status_id', 'Uzduoties statusas:', ['class' => 'col-form-label text-md-right'])}}
        <div class="col-md-3">
        {{Form::select('status_id', ['1' => 'Nauja uzduotis', '2' => 'Atlikta uzduotis', '3' => 'Sena uzduotis'], $task->status_id, ['class' => 'form-control', 'placeholder' => 'Pasirinkite statusa'])}}
        </div>  
    </div>
    <div class="form-group">
        {{Form::label('task_name', 'Uzduoties pavadinimas')}}
        {{Form::text('task_name', $task->task_name, ['class' => 'form-control', 'placeholder' => 'Pavadinimas'])}}
    </div>
    <div class="form-group">
            {{Form::label('perform_up_to', 'Uzduoti atlikti iki:')}}
            {{Form::date('perform_up_to', $task->perform_up_to, ['class' => 'form-control', 'placeholder' => 'Atlikti iki:'])}}
    </div>
    <div class="form-group">
            {{Form::label('task_description', 'Uzduoties aprasymas')}}
            {{Form::textarea('task_description', $task->task_description, ['class' => 'form-control', 'placeholder' => 'Aprasymas'])}}
    </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Pateikti', ['class' => 'btn btn-success'])}}
    {!! Form::close() !!}
@endsection    

@include('inc.footer')