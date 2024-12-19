    <div class="dropdown">
        <span class="h5" id="dropdownMenuButton{{ $task->id }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <svg class="icon-24" xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" fill="none">
                <g>
                    <circle cx="7" cy="12" r="1" fill="black"/>
                    <circle cx="12" cy="12" r="1" fill="black"/>
                    <circle cx="17" cy="12" r="1" fill="black"/>
                </g>
            </svg>
        </span>
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton{{ $task->id }}">
            <form id="duplicate-task-form-{{ $task->id }}" action="{{ route('tasks.duplicate', $task->id) }}" method="POST" style="display: inline;">
                @csrf
                <!-- JavaScript-triggered form submission -->
                <a href="javascript:void(0);" class="dropdown-item" onclick="confirmDuplicate({{ $task->id }})">
                    Duplicate
                </a>
            </form>
            <a class="dropdown-item" href="{{ route('tasks.edit', ['id' => $task->id]) }}">Edit</a>
            <form id="delete-task-form-{{ $task->id }}" action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
              @csrf
              @method('DELETE')
              <a href="javascript:void(0);" class="dropdown-item" onclick="confirmDelete({{ $task->id }})">Delete </a>
          </form>
        </div>
    </div>

