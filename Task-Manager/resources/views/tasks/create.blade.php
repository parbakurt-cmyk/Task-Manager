@extends('layouts.app')

@section('title', 'Add Task')

@section('content')
    <div class="top-bar">
        <h2>Add New Task</h2>
        <a href="{{ route('tasks.index') }}" class="btn btn-outline">&larr; Back to list</a>
    </div>

    <div class="card">
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="task_name">Task Name</label>
                <input type="text" id="task_name" name="task_name" value="{{ old('task_name') }}" required>
                @error('task_name') <ul class="error-list"><li>{{ $message }}</li></ul> @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description">{{ old('description') }}</textarea>
                @error('description') <ul class="error-list"><li>{{ $message }}</li></ul> @enderror
            </div>

            <div class="form-group">
                <label for="due_date">Due Date</label>
                <input type="date" id="due_date" name="due_date" value="{{ old('due_date') }}">
                @error('due_date') <ul class="error-list"><li>{{ $message }}</li></ul> @enderror
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status">
                    <option value="Pending" {{ old('status') === 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Completed" {{ old('status') === 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
                @error('status') <ul class="error-list"><li>{{ $message }}</li></ul> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save Task</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-outline">Cancel</a>
        </form>
    </div>
@endsection
