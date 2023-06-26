<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // This display all task
    public function index()
    {
        $tasks = Task::latest()->get();
        return view('pages.tasks.index', compact('tasks'));
    }

    // Return the form for creating task
    public function create()
    {
        return view('pages.tasks.create');
    }

    // Store request from task form
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);

        Task::create($request->all());

        return redirect('/')
            ->with('success', 'Task created successfully!');
    }

    // Show single task
    public function show(Task $task)
    {
        return view('pages.tasks.show', compact('task'));
    }


    // Display edit  task form
    public function edit(Task $task)
    {
        return view('pages.tasks.edit', compact('task'));
    }

    // Store request from task update form
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);

        $task->update($request->all());

        return redirect('/')
            ->with('success', 'Task updated successfully!');
    }

    // Delete a single task
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect('/')
            ->with('success', 'Task deleted successfully!.');;
    }
}
