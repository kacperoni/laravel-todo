<ul class="list-group mt-3">
    @forelse ($tasks as $task)
    <li class="list-group-item">
      <div >
        <form action="{{route('tasks.done',$task->id)}}" method="POST" class="align-middle" style="display:inline;" >
          @csrf
          @method('put')
          <input type="checkbox" onchange="this.form.submit()">
        </form>
        <span style="text-decoration-line:{{request()->query('done')?'line-through':'none'}};">{{$task->task}}</span>
        <form action="{{route('tasks.destroy',$task->id)}}" method="POST" class="float-end"style="display:inline;">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-secondary btn-sm">X</button>
        </form>
      </div>
    </li>
    @empty
    <div class="alert alert-light">
      Let's create some tasks!
    </div>
    @endforelse
</ul>