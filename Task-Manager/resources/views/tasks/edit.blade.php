@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
    <div class="top-bar">
        <h2>Edit Task</h2>
        <a href="{{ route('tasks.index') }}" class="btn btn-outline">&larr; Back to list</a>
    </div>

    <div class="card">
        <form action="{{ route('tasks.update', $task) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="task_name">Task Name</label>
                <input type="text" id="task_name" name="task_name" value="{{ old('task_name', $task->task_name) }}" required>
                @error('task_name') <ul class="error-list"><li>{{ $message }}</li></ul> @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description">{{ old('description', $task->description) }}</textarea>
                @error('description') <ul class="error-list"><li>{{ $message }}</li></ul> @enderror
            </div>

            <div class="form-group">
                <label for="due_date">Due Date</label>
                <input type="date" id="due_date" name="due_date"
                       value="{{ old('due_date', $task->due_date ? $task->due_date->format('Y-m-d') : '') }}">
                @error('due_date') <ul class="error-list"><li>{{ $message }}</li></ul> @enderror
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status">
                    <option value="Pending" {{ old('status', $task->status) === 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Completed" {{ old('status', $task->status) === 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
                @error('status') <ul class="error-list"><li>{{ $message }}</li></ul> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Task</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-outline">Cancel</a>
        </form>
    </div>
@endsection
