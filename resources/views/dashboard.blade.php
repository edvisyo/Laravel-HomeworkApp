@extends('layouts.app') 
@include('inc.navbar')


{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

<div class="container" style="margin-top: 20px">

@section('content')

<div class="row justify-content-between">
<a href="/dashboard/new_task"><button class="btn btn-primary" style="margin-bottom: 15px; margin-left: 14px">Įkelti naują užduotį</button></a>

<div class="dropdown" style="margin-right: 14px">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Filtruoti pagal:
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <a class="dropdown-item" href="/dashboard?status_id=1">Naujos užduotys</a>
      <a class="dropdown-item" href="/dashboard?status_id=2">Atliktos užduotys</a>
      <a class="dropdown-item" href="/dashboard?status_id=3">Senos užduotys</a>
    </div>
  </div>
</div>
<div class="row justify-content-end" style="margin-right: 0px; margin-bottom: 15px">
    <a href="/dashboard"><button class="btn btn-light">Reset</button></a>
</div>
@include('inc.messages')

@if(count($tasks) > 0)
@foreach($tasks as $task)
<div class="jumbotron">
    <p><b>{{$task->status->name}}</b></p>
    <a href="/tasks/{{$task->id}}"><h1 class="display-7">{{$task->task_name}}</h1></a>
    <hr>
    <h6>Užduotis paskelbta: {{$task->created_at}}</h6>
    <small>Redaguota: {{$task->updated_at}}</small>
</div>
  @endforeach
  {{$tasks->links()}}
        @else
        <h3>Nera užduociu</h3>
    @endif
@endsection
</div>

@include('inc.footer')
