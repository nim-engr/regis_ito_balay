@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Task</h2>
    <form action="{{ route('tasks.update', ['id' => $task->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="Task_title">Task Title</label>
            <input type="text" name="Task_title" id="Task_title" class="form-control" value="{{ $task->Task_title }}" required>
        </div>

        <div class="form-group">
            <label for="Task_desc">Task Description</label>

            <textarea name="Task_desc" id="Task_desc" class="form-control" rows="4" required>{{ $task->Task_desc }}</textarea>
        </div>

        <div class="form-group">
            <label for="name">Assigned To</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $task->name }}" required>
        </div>

        <div class="form-group">
            <label for="Deadline">Deadline</label>
            <input type="date" name="Deadline" id="Deadline" class="form-control" value="{{ $task->Deadline }}" required>
        </div>

        <div class="form-check">
            <input type="checkbox" name="urgent" id="urgent" class="form-check-input" {{ $task->urgent ? 'checked' : '' }}>
            <label for="urgent" class="form-check-label">Urgent</label>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Task</button>
    </form>
</div>
@endsection()
