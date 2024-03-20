<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index()
    {
        // Fetch all tasks from the 'tasks' table using Eloquent
        $tasks = Task::all();
        
        // Pass the tasks to the view and render the 'tasks.index' view
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
{
    // Removes the _token field from the request data. This was causing issues for some reason.
    $requestData = $request->except('_token');

    // Validate the request data
    $validator = Validator::make($requestData, [
        'title' => ['required', 'string', 'max:255'],
        'description' => ['nullable', 'string'],
    ]);

    if ($validator->fails()) {
        // If validation fails, redirect back with validation errors
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    // Create a new task instance with the validated data
    $task = Task::create($requestData);

    // session()->flash('success', 'Your task has been added');

    // return redirect()->route('tasks.index');


    return redirect('/tasks')->with('success', 'Your task has been added');
}

    public function show()
    {

    }


    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }


    public function update(Request $request, Task $task)
    {
        {
    $validator = Validator::make($request->all(), [
        'title' => ['required', 'string', 'max:255'],
        'description' => ['nullable', 'string'],
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $task->update($request->only('title', 'description'));

    return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }

    }


    public function destroy()
    {

    }


}
