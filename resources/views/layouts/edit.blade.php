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

                        <div>
                            <div class="form-group">
                                <label class="form-label" for="name">Priority</label>
                                <select name="Priority" class="form-select" required>
                                    <option value="1" {{ old('Priority', $task->Priority) == "1" ? 'selected' : '' }}>Low</option>
                                    <option value="2" {{ old('Priority', $task->Priority) == "2" ? 'selected' : '' }}>Moderate</option>
                                    <option value="3" {{ old('Priority', $task->Priority) == "3" ? 'selected' : '' }}>High</option>
                                </select>
                                    <!-- Loop through all users -->
                            <div class="form-group">
                                <label class="form-label" for="exampleFormControlSelect1">Responsible Person</label>
                                <select class="form-select" name="name" id="name" id="Resp_person">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ $task->name == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                        <option value="">Unassign</option>
                                    @endforeach
                                </select>
                            </div>
                                        @error('user_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror


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
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-danger" onclick="window.history.back()">Cancel</button>
                    </div>
                </form>
</div>
@endsection

