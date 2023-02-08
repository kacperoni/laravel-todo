<ul class="list-group mt-3">
    @forelse ($tasks as $task)
    <li class="list-group-item">
      <div>
      @if(!request()->query('done'))
        @include('tasks._form')
      @endif
      <a href="{{route('tasks.index',['editTask'=>$task])}}">
        <span style="text-decoration-line:{{request()->query('done')?'line-through':'none'}};">{{$task->task}}</span>
      </a>
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