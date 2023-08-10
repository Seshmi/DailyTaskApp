<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'task' => 'required|max:100|min:5',
        ]);

        $task = new Task;
        $task->task = $request->task;
        $task->save();

        $data = Task::all();

        return view('tasks')->with('tasks', $data);
    }

    public function updateTaskAsCompleted($id)
    {
        $task = Task::findOrFail($id);
        $task->iscompleted = 1;
        $task->save();

        return redirect()->back();
    }

    public function updateTaskAsNotCompleted($id)
    {
        $task = Task::findOrFail($id);
        $task->iscompleted = 0;
        $task->save();

        return redirect()->back();
    }

    public function deleteTask($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->back();
    }

    public function updateTaskView($id)
    {
        $task = Task::findOrFail($id);
        return view('updatetask')->with('taskdata', $task);
    }

    public function updateTask(Request $request)
    {
        $id = $request->id;
        $task = $request->task;
        $data = Task::findOrFail($id);
        $data->task = $task;
        $data->save();

        $data = Task::all();
        return view('tasks')->with('tasks', $data);
    }
}
