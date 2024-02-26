<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Task;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{

    public function index()
    {
        // $tasks = auth()->user()->tasks;
        $tasks=Task::where('users_id', auth()->user()->id)->get();
        return view('indexPage', compact('tasks'));
    }

    public function view(){
        return view('createTaskForm');
    }

    public function store(Request $request)
    {
        $incomingFields = $request->validate([
            'task_name' => "required",
            'description' => "required",
            'due_date' => "required",
        ]);

        $incomingFields['task_name'] = strip_tags($incomingFields['task_name']);
        $incomingFields['due_date'] = strip_tags($incomingFields['due_date']);
        $incomingFields['description'] = strip_tags($incomingFields['description']);
        $incomingFields['users_id'] = auth()->id();


        $newTask = Task::create($incomingFields);

        return redirect()->route('task.index')->with('success', 'Task inserted successfully');
    }

    public function edit($id){
        $task = Task::findOrFail($id);
        return view('edit-task', ['task' => $task]);
    }
    
    public function update(Request $request, $id){
        $incomingFields = $request->validate([
            'task_name' => "required",
            'description' => "required",
            'due_date' => "required",
        ]);
        
        $task = Task::findOrFail($id);
        $task->update($incomingFields);

        return redirect()->route('task.index')->with('success', 'Task updated successfully');
    }

    public function show($id){
        $task = Task::findOrFail($id);
        return view ('viewTask', ['task' => $task]);
    }

    public function delete($id){

        $task = Task::find($id);
        if(!$task){
            return redirect()->route('task.index')->with('fail', 'Data not found');
        }
        $task->delete();
        return redirect()->route('task.index')->with('sucess', 'Data deleted');
    }


}