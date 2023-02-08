<form action="{{route('tasks.done',$task->id)}}" method="POST" class="align-middle" style="display:inline;" >
    @csrf
    @method('put')
    <input type="checkbox" onchange="this.form.submit()">
</form>