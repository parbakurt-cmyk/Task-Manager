@extends('layouts.app')

@section('title', 'My Tasks')

@section('content')
    <div class="top-bar">
        <h2>My Tasks</h2>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">+ Add Task</a>
    </div>

    <div class="card">
        @if ($tasks->isEmpty())
            <div class="empty-state">
                <p>No tasks yet. Click <strong>"+ Add Task"</strong> to create your first one.</p>
            </div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Task</th>
                        <th>Description</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td><strong>{{ $task->task_name }}</strong></td>
                            <td>{{ $task->description ? \Illuminate\Support\Str::limit($task->description, 60) : '—' }}</td>
                            <td>{{ $task->due_date ? $task->due_date->format('M d, Y') : '—' }}</td>
                            <td>
                                <span class="badge {{ $task->status === 'Completed' ? 'badge-completed' : 'badge-pending' }}">
                                    {{ $task->status }}
                                </span>
                            </td>
                            <td>
                                <div class="actions">
                                    <form class="inline" action="{{ route('tasks.updateStatus', $task) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-outline btn-sm">
                                            Mark as {{ $task->status === 'Pending' ? 'Completed' : 'Pending' }}
                                        </button>
                                    </form>

                                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary btn-sm">Edit</a>

                                    <form class="inline" action="{{ route('tasks.destroy', $task) }}" method="POST"
                                          onsubmit="return confirm('Delete this task? This cannot be undone.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
