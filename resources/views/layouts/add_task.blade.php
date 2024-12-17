@extends('layouts.app')
@section('task')

<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <div class="header-title">
            <h4 class="card-title">Add Task</h4>
        </div>
    </div>

    <form action="{{ route('task_save') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label class="form-label" for="exampleInputReadonly">Task Name</label>
                <input type="text" class="form-control" name="Task_title" id="Task_title" placeholder="Add a clear, concise task name" value="{{ old('Task_title') }}">
                @error('Task_title')
                     <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="exampleInputReadonly">Task Description</label>
                <textarea class="form-control" name="Task_desc" id="Task_desc" placeholder="Add Concise Task Instructions">{{ old('Task_desc') }}</textarea>
                @error('Task_desc')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="exampleFormControlSelect1">Responsible Person</label>
                <select class="form-select" name="name" id="name">
                    <option selected value="">Unassigned</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ old('name') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="file" class="form-label">Attach File <i>(MAX 2MB)</i></label>
                <input type="file" name="file" id="file" class="form-control">
                @if (old('file'))
                    <div class="mt-2">Previously uploaded file: <strong>{{ old('file') }}</strong></div>
                @endif
                @error('file')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="Deadline">Task Deadline</label>
                <input type="date" class="form-control" name="Deadline" id="Deadline" value="{{ old('Deadline') }}">
                @error('Deadline')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="Priority">Priority:</label>
                <select class="form-select" name="Priority" id="Priority">
                    <option value="" disabled {{ old('Priority') ? '' : 'selected' }}>Select Priority</option>
                    <option value="1" {{ old('Priority') == '1' ? 'selected' : '' }}>Low Priority</option>
                    <option value="2" {{ old('Priority') == '2' ? 'selected' : '' }}>Moderate Priority</option>
                    <option value="3" {{ old('Priority') == '3' ? 'selected' : '' }}>High Priority</option>
                </select>
                @error('Priority')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-danger" onclick="window.history.back()">Cancel</button>
        </div>
    </form>
</div>

@endsection
