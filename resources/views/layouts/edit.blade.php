@extends('layouts.app')
@section('task')

<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <div class="header-title">
            <h4 class="card-title">Task Details</h4>
        </div>
    </div>
                <form action="{{ route('tasks.update', ['id' => $task->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label" for="exampleInputReadonly">Task Name</label>
                            <input type="text" class="form-control" name="Task_title" id="Task_title" value="{{ $task->Task_title }}">
                            @error('Task_title')
                                 <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="exampleInputReadonly">Task Description</label>
                            <textarea class="form-control" name="Task_desc" id="Task_desc" value="{{ $task->Task_desc }}">{{ old('Task_desc', $task->Task_desc) }}</textarea>
                            @error('Task_desc')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlSelect1">Responsible Person</label>
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Assigned To</label>
                                <select class="form-select" name="name" id="name" required>
                                    <!-- Option to set the value to NULL -->
                                    <option value="" {{ is_null($task->user_id) ? 'selected' : '' }}>Unassigned</option>
                                    <!-- Loop through all users to display their names -->
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ old('user_id', $task->user_id) == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="customFile1" class="form-label custom-file-input">Attachment Files (Optional)</label>
                            <input class="form-control" type="file" id="file" id="file_attach">
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputReadonly">Task Deadline</label>
                                <input type="date" class="form-control" name="Deadline" id="Deadline" value="{{ $task->Deadline }}">
                                @error('Deadline')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-check form-switch">
                                <!-- Hidden field to send 0 when the switch is off -->
                                <input type="hidden" name="urgent" value="0">

                                <!-- Switch -->
                                <input class="form-check-input" type="checkbox" name="urgent" id="urgent" value="1" {{ old('urgent', $task->urgent) == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="urgent">Urgent Submission</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-danger" onclick="window.history.back()">Cancel</button>
                    </div>
                </form>
</div>
@endsection

