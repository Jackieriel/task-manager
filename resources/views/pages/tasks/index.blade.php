@extends('layouts.app')

@section('content')
    <h1>Task Manager</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Create Task</a>
    <table class="table table-responsive table-bordered">
        <thead>
            <tr>
                <th class="col-md-8">Title</th>
                <th class="col-md-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tasks as $task)
                <tr>
                    <td class="col-md-8">{{ $task->title }}</td>
                    <td class="col-md-4">
                        <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No tasks found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
