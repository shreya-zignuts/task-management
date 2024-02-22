<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Controllers\Auth;

class TaskController extends Controller
{

    public function index()
    {
        // $tasks = auth()->user()->tasks;
        $tasks=Task::where('users_id', auth()->user()->id)->paginate(6);

        return view('indexPage', compact('tasks'));
    }

    public function showForm(){
        return view('createTaskForm');
    }
    public function storeData(Request $request)
    {
        $request->validate([
            'due_date' => "required",
            'description' => "required",
            'taskname' => "required",
        ]);

        $task = new Task;
        $task->taskname = $request['taskname'];
        $task->due_date = $request['due_date'];
        $task->description = $request['description'];
        $task->users_id = $request['users_id'];
        $task->save();

        return redirect()->route('index')->with('success', 'Task inserted successfully');
    }
}