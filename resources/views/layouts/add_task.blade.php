@extends('layouts.app')
@section('task')

<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <div class="header-title">
            <h4 class="card-title">Task Details</h4>
        </div>
    </div>

    <form action="{{ route('task_save') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label class="form-label" for="exampleInputReadonly">Task Name</label>
                <input type="text" class="form-control" name="Task_title" id="Task_title" placeholder="Add a clear, concise task name">
                @error('Task_title')
                     <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="exampleInputReadonly">Task Description</label>
                <textarea class="form-control" name="Task_desc" id="Task_desc" placeholder="Add Concise Task Instructions"></textarea>
                @error('Task_desc')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="exampleFormControlSelect1">Responsible Person</label>
                <select class="form-select" name="name" id="name" id="Resp_person">
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old('id', $user->name) === $user->name ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                    @endforeach
                    <option selected="Unassigned" value="" >Unassigned</option>
                </select>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <form action="{{ route('files.upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="customFile1" class="form-label custom-file-input">Attach Files (Optional)</label>
                        <input type="file" name="file" id="file" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>

            <div class="form-group">
                <div class="form-group">
                    <label class="form-label" for="exampleInputReadonly">Task Deadline</label>
                    <input type="date" class="form-control" name="Deadline" id="Deadline">
                    @error('Deadline')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="exampleFormControlSelect1">Priority:</label>
                    <select class="form-select" name="Priority" id="Priority" id="Resp_person">
                        <option selected value=" " disabled>  </option>
                        <option value="1"> Low Priority </option>
                        <option value="2"> Moderate Priority </option>
                        <option value="3"> High Priority </option>
                    </select>
                    @error('Priority')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-danger" onclick="window.history.back()">Cancel</button>
        </div>
    </form>
</div>

@endsection()
