@extends('layouts.app')
@section('task')

<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <div class="header-title">
            <h4 class="card-title">Edit Task</h4>
        </div>
    </div>
    <form action="{{ route('tasks.update', ['id' => $task->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card-body">
            <!-- Task Name -->
            <div class="form-group">
                <label class="form-label" for="Task_title">Task Name</label>
                <input type="text" class="form-control" name="Task_title" id="Task_title" value="{{ old('Task_title', $task->Task_title) }}" required>
                @error('Task_title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Task Description -->
            <div class="form-group">
                <label class="form-label" for="Task_desc">Task Description</label>
                <textarea class="form-control" name="Task_desc" id="Task_desc" required>{{ old('Task_desc', $task->Task_desc) }}</textarea>
                @error('Task_desc')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Priority -->
            <div class="form-group">
                <label class="form-label" for="Priority">Priority</label>
                <select name="Priority" class="form-select" required>
                    <option value="1" {{ old('Priority', $task->Priority) == "1" ? 'selected' : '' }}>Low</option>
                    <option value="2" {{ old('Priority', $task->Priority) == "2" ? 'selected' : '' }}>Moderate</option>
                    <option value="3" {{ old('Priority', $task->Priority) == "3" ? 'selected' : '' }}>High</option>
                </select>
                @error('Priority')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Responsible Person -->
            <div class="form-group">
                <label class="form-label" for="name">Responsible Person</label>
                <select name="name" class="form-select" id="name">
                    <option value="">Unassigned</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ old('name', $task->name) == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- File Upload -->
            <div class="form-group">
                <label for="file" class="form-label">Attach File <i>(MAX 2MB)</i></label>
                <input type="file" name="file" id="file" class="form-control">
                @if(isset($task->file_path) && $task->file_path)
                    <div class="mb-2">
                        <a href="{{ asset('storage/' . $task->file_path) }}" target="_blank" class="btn btn-link">
                            Previous File: {{ $task->file_name ?? 'View File' }}
                        </a>
                    </div>
                @endif
                @error('file')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Deadline -->
            <div class="form-group">
                <label class="form-label" for="Deadline">Task Deadline</label>
                <input type="date" class="form-control" name="Deadline" id="Deadline" value="{{ old('Deadline', $task->Deadline) }}" required>
                @error('Deadline')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Buttons -->
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-danger" onclick="window.history.back()">Cancel</button>
        </div>
    </form>
</div>
@endsection
