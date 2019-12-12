@extends('layouts.app')
@include('inc.navbar')

@section('content')
<a href="/dashboard" class="btn btn-primary" style="margin-bottom: 15px; margin-top: 15px">Atgal</a>
<hr>
<h3>{{$task->task_name}}</h3>
<br>
<p>{{$task->task_description}}</p>
{{-- <small>Uzduotis paskelbta: {{$task->created_at}}</small> --}}
<br>
<h5 style="color: red">Užduotį atlikti iki: {{$task->perform_up_to}}</h5>
<hr>
<div class="row justify-content-between">
<a href="/tasks/{{$task->id}}/edit" class="btn btn-warning" style="margin-left: 14px">Redaguoti</a> 
<div style="margin-right: 14px">
{!!Form::open(['action' => ['TasksController@destroy', $task->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Ištrinti', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
</div>
</div>
@endsection

@include('inc.footer')