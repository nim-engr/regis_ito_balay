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
                <option selected="" disabled="">Assign to</option>
                <option value="1">Britt Montalvo</option>
                <option value= "2">user 1</option>
                <option value="3">user 2</option>
                <option value="4">user 3</option>
                <option value="5">user 4</option>
                </select>
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
                    <input type="date" class="form-control" name="Deadline" id="Deadline">
                    @error('Deadline')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-check form-switch">
                    <!-- Hidden field to send 0 when the switch is off -->
                    <input type="hidden" name="urgent" value="0">

                    <!-- Switch -->
                    <input class="form-check-input" type="checkbox" name="urgent" id="urgent" value="1" {{ old('urgent', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="urgent">Urgent Submission</label>
                </div>

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="submit" class="btn btn-danger">Cancel</button>
        </div>
    </form>
</div>

@endsection()
