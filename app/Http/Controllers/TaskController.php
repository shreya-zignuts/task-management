<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;

class TaskController extends Controller
{

    public function index()
    {
        // $tasks = auth()->user()->tasks;
        $tasks=Task::all();
        return view('indexPage', compact('tasks'));
    }

    public function view(){
        return view('createTaskForm');
    }

    public function store(Request $request)
    {
        $incomingFields = $request->validate([
            'taskname' => "required",
            'description' => "required",
            'due_date' => "required",
        ]);

        $incomingFields['taskname'] = strip_tags($incomingFields['taskname']);
        $incomingFields['description'] = strip_tags($incomingFields['description']);
        $incomingFields['due_date'] = strip_tags($incomingFields['due_date']);
        $incomingFields['users_id'] = auth()->id();
        
        $newTask = Task::create($incomingFields);

        return redirect()->route('task.index')->with('success', 'Task inserted successfully');
    }

    public function edit($tasks_id){
        $task = Task::findOrFail($tasks_id);
        return view('edit-task', ['task' => $task]);
    }
    
    public function update(Request $request, $tasks_id){
        $incomingFields = $request->validate([
            'taskname' => "required",
            'description' => "required",
            'due_date' => "required",
        ]);
        
        $task = Task::findOrFail($tasks_id);
        $task->update($incomingFields);

        return redirect()->route('task.index')->with('success', 'Task updated successfully');
    }

    public function showSingleTask($tasks_id){
        $task = Task::findOrFail($tasks_id);
        return view ('viewTask', ['task' => $task]);
    }

    public function delete($tasks_id){

        $task = Task::find($tasks_id);
        if(!$task){
            return redirect()->route('task.index')->with('fail', 'Data not found');
        }
        $task->delete();
        return redirect()->route('task.index')->with('sucess', 'Data deleted');
    }


}