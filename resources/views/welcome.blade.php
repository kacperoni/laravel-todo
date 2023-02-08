@extends('layouts.main')
  @section('content')
    <div class="row justify-content-md-center mt-3">

      <div class="col-md-6">
        <header class="mb-2">
        <h1 style="display:inline;">Todoapp</h1>
        @if(request()->query('done'))<small >(done)</small>@endif
        </header>
        <form action="{{route('tasks.create')}}" method="post">
          @csrf
          <div class="form-group">
            <input class="form-control" type="text" name="task" placeholder="Create new task..." autocomplete="off">
            <input class="form-check-input" type="submit" hidden>
          </div>
        </form>
        @include('tasks.index')
        <div class="col mt-3">
          <a href="{{request()->fullUrlWithQuery(['done'=>false])}}" class="btn btn-outline-{{!request()->query('done')?'primary':'secondary'}}">Todo</a> 
          | 
          <a href="{{request()->fullUrlWithQuery(['done'=>true])}}" class="btn btn-outline-{{request()->query('done')?'primary':'secondary'}}">Done</a>
        </div>
      </div>
      
    </div>
  @endsection


