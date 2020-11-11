@extends('layout.app')
@section('content')
    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
        <div class="text-center" style="width:40%">
        <h1> Edit your task</h1>
        <form action="{{route('task.update', $task->id)}}" method="POST">
         @csrf
         @method('PUT')
          <div class="input-group mb-3 w-100">
            <input type="text" class="form-control form-control-lg" name='name' value="{{$task->name}}" aria-label="Recipient's username" aria-describedby="button-addon2">
            <div class="input-group-append">
              <button class="btn btn-success" type="submit" id="button-addon2"> Change The Task</button>
            </div>
          </div>
        </form> 

       
        </div>
    </div>

@endsection