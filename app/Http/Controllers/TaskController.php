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
    /**
     * Display a listing of the user's tasks.
     */
    public function index()
    {
        // $tasks = auth()->user()->tasks;
        $tasks=Task::where('user_id', auth()->user()->id)->paginate(14);
        return view('index-page', compact('tasks'));
    }

    /**
     * Display the form for creating a new task.
     */
    public function view(){
        return view('create-task-form');
    }

    /**
     * Store a newly created task in the database.
     */
    public function store(Request $request)
    {
        $incomingFields = $request->validate([
            'task_name' => "required",
            'description' => "required",
            'due_date' => "required|date|after_or_equal:today",
        ]);

        $incomingFields['task_name'] = strip_tags($incomingFields['task_name']);
        $incomingFields['due_date'] = strip_tags($incomingFields['due_date']);
        $incomingFields['description'] = strip_tags($incomingFields['description']);
        $incomingFields['user_id'] = auth()->id();


        $newTask = Task::create($incomingFields);

        return redirect()->route('task.index')->with('success', 'Task inserted successfully');
    }

    /**
     * Display the form for editing an existing task.
     */
    public function edit($id){
        $task = Task::findOrFail($id);
        return view('edit-task', ['task' => $task]);
    }
    
    /**
     * Update the specified task in the database.
     */
    public function update(Request $request, $id){
        $incomingFields = $request->validate([
            'task_name' => "required",
            'description' => "required",
            'due_date' => "required|date|after_or_equal:today",
        ]);
        
        $task = Task::findOrFail($id);
        $task->update($incomingFields);

        return redirect()->route('task.index')->with('success', 'Task updated successfully');
    }

    /**
     * Display the specified task.
     */
    public function show($id){
        $task = Task::findOrFail($id);
        return view ('view-task', ['task' => $task]);
    }

    /**
     * Delete the specified task from the database and from the table.
     */
    public function delete($id){

        $task = Task::find($id);
        if(!$task){
            return redirect()->route('task.index')->with('fail', 'Data not found');
        }
        $task->delete();
        return redirect()->route('task.index')->with('sucess', 'Data deleted');
    }


}