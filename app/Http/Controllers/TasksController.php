<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    public function index(){
        $query = Task::query();
        if(request()->query('done')){
            $tasks = $query->where('done',true)->get();
        }
        else{
            $tasks = $query->where('done',false)->get();
        }

        return view('welcome',['tasks'=>$tasks]);
    }

    public function create(Request $request){
        $task = $request->validate([
            'task'=>'required|max:100'
        ]);
        Task::create($task);
        return redirect(route('tasks.index'));
    }

    public function destroy(int $id){
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect(route('tasks.index'));
    }

    public function done(int $id){
        $task = Task::findOrFail($id);
        $task->done = true;
        $task->update();
        return redirect(route('tasks.index'));
    }

}
