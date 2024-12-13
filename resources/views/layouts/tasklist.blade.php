@extends('layouts.app')
@section('task')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between flex-wrap">
                    <p class="mb-md-0 mb-2 d-flex align-items-center">
                        <svg  width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-2 icon-20">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.56517 3C3.70108 3 3 3.71286 3 4.5904V5.52644C3 6.17647 3.24719 6.80158 3.68936 7.27177L8.5351 12.4243L8.53723 12.4211C9.47271 13.3788 9.99905 14.6734 9.99905 16.0233V20.5952C9.99905 20.9007 10.3187 21.0957 10.584 20.9516L13.3436 19.4479C13.7602 19.2204 14.0201 18.7784 14.0201 18.2984V16.0114C14.0201 14.6691 14.539 13.3799 15.466 12.4243L20.3117 7.27177C20.7528 6.80158 21 6.17647 21 5.52644V4.5904C21 3.71286 20.3 3 19.4359 3H4.56517Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        Filter by task name...
                    </p>
                    <div class="d-flex align-items-center flex-wrap">
                        <div class="dropdown me-3">
                            <span class="dropdown-toggle align-items-center d-flex" id="dropdownMenuButton04" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Sort By:
                            </span>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton04" style="">
                                <a class="dropdown-item" href="#">Status</a>
                                <a class="dropdown-item" href="#">Task Name</a>
                                <a class="dropdown-item" href="#">Priority</a>
                                <a class="dropdown-item" href="#">Assignee</a>
                                <a class="dropdown-item" href="#">Due date</a>
                                <a class="dropdown-item" href="#">Start date</a>
                                <a class="dropdown-item" href="#">Time tracked</a>
                            </div>
                        </div>
                        <div class="dropdown me-3">
                            <span class="dropdown-toggle align-items-center d-flex" id="dropdownMenuButton05" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Group By: Status
                            </span>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton05" style="">
                                <a class="dropdown-item" href="#">
                                    <svg  width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-2 icon-20">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.3345 2.75024H7.66549C4.64449 2.75024 2.75049 4.88924 2.75049 7.91624V16.0842C2.75049 19.1112 4.63549 21.2502 7.66549 21.2502H16.3335C19.3645 21.2502 21.2505 19.1112 21.2505 16.0842V7.91624C21.2505 4.88924 19.3645 2.75024 16.3345 2.75024Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M8.43994 12.0002L10.8139 14.3732L15.5599 9.6272" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    Status
                                </a>
                                <a class="dropdown-item" href="#">
                                    <svg  width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-2 icon-20">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.59151 15.2068C13.2805 15.2068 16.4335 15.7658 16.4335 17.9988C16.4335 20.2318 13.3015 20.8068 9.59151 20.8068C5.90151 20.8068 2.74951 20.2528 2.74951 18.0188C2.74951 15.7848 5.88051 15.2068 9.59151 15.2068Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.59157 12.0198C7.16957 12.0198 5.20557 10.0568 5.20557 7.63476C5.20557 5.21276 7.16957 3.24976 9.59157 3.24976C12.0126 3.24976 13.9766 5.21276 13.9766 7.63476C13.9856 10.0478 12.0356 12.0108 9.62257 12.0198H9.59157Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M16.4829 10.8815C18.0839 10.6565 19.3169 9.28253 19.3199 7.61953C19.3199 5.98053 18.1249 4.62053 16.5579 4.36353" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M18.5952 14.7322C20.1462 14.9632 21.2292 15.5072 21.2292 16.6272C21.2292 17.3982 20.7192 17.8982 19.8952 18.2112" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    Assignee
                                </a>
                                <a class="dropdown-item" href="#">
                                    <svg  width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-2 icon-20">
                                        <path d="M7.24512 14.7815L10.2383 10.8914L13.6524 13.5733L16.5815 9.79297" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <circle cx="19.9954" cy="4.20027" r="1.9222" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
                                        <path d="M14.9248 3.12012H7.65704C4.6456 3.12012 2.77832 5.25284 2.77832 8.26428V16.3467C2.77832 19.3581 4.60898 21.4817 7.65704 21.4817H16.2612C19.2726 21.4817 21.1399 19.3581 21.1399 16.3467V9.30776" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    Priority
                                </a>
                                <a class="dropdown-item" href="#">
                                    <svg  width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-2 icon-20">
                                        <path d="M13.8496 4.25024V6.67024" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M13.8496 17.76V19.784" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M13.8496 14.3247V9.50366" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M18.7021 20C20.5242 20 22 18.5426 22 16.7431V14.1506C20.7943 14.1506 19.8233 13.1917 19.8233 12.001C19.8233 10.8104 20.7943 9.85039 22 9.85039L21.999 7.25686C21.999 5.45745 20.5221 4 18.7011 4H5.29892C3.47789 4 2.00104 5.45745 2.00104 7.25686L2 9.93485C3.20567 9.93485 4.17668 10.8104 4.17668 12.001C4.17668 13.1917 3.20567 14.1506 2 14.1506V16.7431C2 18.5426 3.4758 20 5.29787 20H18.7021Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    Tags
                                </a>
                                <a class="dropdown-item" href="#">
                                    <svg  width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-2 icon-20">
                                        <path d="M3.09277 9.40421H20.9167" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M16.442 13.3097H16.4512" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M12.0045 13.3097H12.0137" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M7.55818 13.3097H7.56744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M16.442 17.1962H16.4512" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M12.0045 17.1962H12.0137" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M7.55818 17.1962H7.56744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M16.0433 2V5.29078" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M7.96515 2V5.29078" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.2383 3.5791H7.77096C4.83427 3.5791 3 5.21504 3 8.22213V17.2718C3 20.3261 4.83427 21.9999 7.77096 21.9999H16.229C19.175 21.9999 21 20.3545 21 17.3474V8.22213C21.0092 5.21504 19.1842 3.5791 16.2383 3.5791Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    Due Date
                                </a>
                                <a class="dropdown-item" href="#">
                                    <svg  width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-2 icon-20">
                                        <path d="M14.3955 9.59497L9.60352 14.387" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M14.3971 14.3898L9.60107 9.59277" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.3345 2.75024H7.66549C4.64449 2.75024 2.75049 4.88924 2.75049 7.91624V16.0842C2.75049 19.1112 4.63549 21.2502 7.66549 21.2502H16.3335C19.3645 21.2502 21.2505 19.1112 21.2505 16.0842V7.91624C21.2505 4.88924 19.3645 2.75024 16.3345 2.75024Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    None
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card-transparent mb-0 desk-info">
            <div class="card-body p-0">
                <div class="row">

                    <div class="group1-wrap">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5>Open Task <strong>({{ $task_Active }})</strong></h5>
                        </div>

                        @foreach ($tasksGrouped->get('open', collect()) as $task)
                        <div class="group" id="group{{ $task->id }}">
                            <div class="col-lg-12 group__item">
                                <div class="card" id="task-card-{{ $task->id }}">
                                    <div class="card-body">
                                        <div class="d-grid grid-flow-col align-items-center justify-content-between mb-2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="mb-0"><strong>Task Title: &nbsp;</strong></p>
                                                 <p class="mb-0" id="task-title-{{ $task->id }}">{{ $task->Task_title }}</p>
                                            </div>
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
                                                    <form action="{{ route('tasks.duplicate', $task->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        <!-- JavaScript-triggered form submission -->
                                                        <a href="javascript:void(0);"
                                                           class="dropdown-item"
                                                           onclick="if (confirm('Are you sure you want to duplicate this task?')) this.closest('form').submit();">
                                                            Duplicate
                                                        </a>
                                                    </form>
                                                    <a class="dropdown-item" href="{{ route('tasks.edit', ['id' => $task->id]) }}">Edit</a>
                                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <!-- JavaScript-triggered form submission -->
                                                        <a href="javascript:void(0);"
                                                           class="dropdown-item"
                                                           onclick="if (confirm('Are you sure you want to delete this task?')) this.closest('form').submit();">
                                                            Delete
                                                        </a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mb-1"><strong>Task Description: &nbsp;</strong></p>
                                        <h6 class="mb-3" id="task-desc-{{ $task->id }}">{{ $task->Task_desc }}</h6>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0">
                                                <strong>Deadline:</strong>
                                            </p>
                                                <span class="align-content-right" id="task-deadline-{{ $task->id }}">{{ $task->Deadline }}</span>
                                        </div>
                                        <div class="mb-0 d-flex justify-content-between align-items-center">
                                            <p><strong>Requested by:</strong></p>
                                            <p>{{ $task->creator->name }}</p>
                                        </div>
                                        <div class="mb-0 d-flex justify-content-between align-items-center">
                                            <p><strong>Responsible Person:</strong></p>
                                            @if ($task->name)
                                                <p class="justify-content-between align-content-right">{{ $task->user->name }}</p>
                                            @else
                                                <form action="{{ route('tasks.take', $task->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary btn-sm justify-content-between align-content-right ">Take Task</button>
                                                </form>
                                            @endif
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <p class="mb-0"><strong>Priority:</strong></p>
                                            <p class="mb-0">
                                                @if ($task->Priority == "1")
                                                    <span id="task-Priority-{{ $task->id }}" class="badge rounded-pill bg-success">Low</span>
                                                @elseif ($task->Priority == "2")
                                                    <span id="task-Priority-{{ $task->id }}" class="badge rounded-pill bg-warning">Moderate</span>
                                                @elseif ($task->Priority == "3")
                                                    <span id="task-Priority-{{ $task->id }}" class="badge rounded-pill bg-danger">High</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div>
                                            @if(isset($task->file_path) && $task->file_path)
                                                <a href="{{ asset('storage/' . $task->file_path) }}" target="_blank">
                                                    <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7366 2.76176H8.08455C6.00455 2.75276 4.29955 4.41076 4.25055 6.49076V17.3398C4.21555 19.3898 5.84855 21.0808 7.89955 21.1168C7.96055 21.1168 8.02255 21.1168 8.08455 21.1148H16.0726C18.1416 21.0938 19.8056 19.4088 19.8026 17.3398V8.03976L14.7366 2.76176Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M14.4731 2.75V5.659C14.4731 7.079 15.6221 8.23 17.0421 8.234H19.7961" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M14.2926 13.7471H9.39258" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg></a>
                                            @else
                                                <i>No files uploaded</i>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach

                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card-transparent mb-0 desk-info">
            <div class="card-body p-0">
                <div class="row">

                    <div class="group1-wrap">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5>In Progress <strong>({{ $progress_Active }})</strong> </h5>
                        </div>

                        @foreach ($tasksGrouped->get('progress', collect()) as $task)
                        <div class="group" id="group{{ $task->id }}">
                            <div class="col-lg-12 group__item">
                                <div class="card" id="task-card-{{ $task->id }}">
                                    <div class="card-body">
                                        <div class="d-grid grid-flow-col align-items-center justify-content-between mb-2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="mb-0"><strong>Task Title: &nbsp;</strong></p>
                                                 <p class="mb-0" id="task-title-{{ $task->id }}">{{ $task->Task_title }}</p>
                                            </div>
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
                                                    <form action="{{ route('tasks.duplicate', $task->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        <!-- JavaScript-triggered form submission -->
                                                        <a href="javascript:void(0);"
                                                           class="dropdown-item"
                                                           onclick="if (confirm('Are you sure you want to duplicate this task?')) this.closest('form').submit();">
                                                            Duplicate
                                                        </a>
                                                    </form>
                                                    <a class="dropdown-item" href="{{ route('tasks.edit', ['id' => $task->id]) }}">Edit</a>
                                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <!-- JavaScript-triggered form submission -->
                                                        <a href="javascript:void(0);"
                                                           class="dropdown-item"
                                                           onclick="if (confirm('Are you sure you want to delete this task?')) this.closest('form').submit();">
                                                            Delete
                                                        </a>
                                                    </form>


                                                </div>
                                            </div>
                                        </div>
                                        <p class="mb-1"><strong>Task Description: &nbsp;</strong></p>
                                        <h6 class="mb-3" id="task-desc-{{ $task->id }}">{{ $task->Task_desc }}</h6>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0">
                                                <strong>Deadline:</strong>
                                            </p>
                                                <span class="align-content-right" id="task-deadline-{{ $task->id }}">{{ $task->Deadline }}</span>
                                        </div>
                                        <div class="mb-0 d-flex justify-content-between align-items-center">
                                            <p><strong>Requested by:</strong></p>
                                            <p>{{ $task->creator->name }}</p>
                                        </div>
                                        <div class="mb-0 d-flex justify-content-between align-items-center">
                                            <p><strong>Responsible Person:</strong></p>
                                            @if ($task->name)
                                                <p class="justify-content-between align-content-right">{{ $task->user->name }}</p>
                                            @else
                                                <form action="{{ route('tasks.take', $task->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary btn-sm justify-content-between align-content-right ">Take Task</button>
                                                </form>
                                            @endif
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <p class="mb-0"><strong>Priority:</strong></p>
                                            <p class="mb-0">
                                                @if ($task->Priority == "1")
                                                    <span id="task-Priority-{{ $task->id }}" class="badge rounded-pill bg-success">Low</span>
                                                @elseif ($task->Priority == "2")
                                                    <span id="task-Priority-{{ $task->id }}" class="badge rounded-pill bg-warning">Moderate</span>
                                                @elseif ($task->Priority == "3")
                                                    <span id="task-Priority-{{ $task->id }}" class="badge rounded-pill bg-danger">High</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div>
                                            @if(isset($task->file_path) && $task->file_path)
                                                <a href="{{ asset('storage/' . $task->file_path) }}" target="_blank" class="position-relative">
                                                    <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7366 2.76176H8.08455C6.00455 2.75276 4.29955 4.41076 4.25055 6.49076V17.3398C4.21555 19.3898 5.84855 21.0808 7.89955 21.1168C7.96055 21.1168 8.02255 21.1168 8.08455 21.1148H16.0726C18.1416 21.0938 19.8056 19.4088 19.8026 17.3398V8.03976L14.7366 2.76176Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M14.4731 2.75V5.659C14.4731 7.079 15.6221 8.23 17.0421 8.234H19.7961" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M14.2926 13.7471H9.39258" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                    <!-- Badge for the number of files -->
                                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                                                        {{ $task->files_count ?? 1 }}
                                                    </span>
                                                </a>
                                            @else
                                                <i>No files uploaded</i>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card-transparent mb-0 desk-info">
            <div class="card-body p-0">
                <div class="row">

                    <div class="group1-wrap">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5>Review <strong>({{ $review_Active }})</strong></h5>
                        </div>

                        @foreach ($tasksGrouped->get('review', collect()) as $task)
                        <div class="group" id="group{{ $task->id }}">
                            <div class="col-lg-12 group__item">
                                <div class="card" id="task-card-{{ $task->id }}">
                                    <div class="card-body">
                                        <div class="d-grid grid-flow-col align-items-center justify-content-between mb-2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="mb-0"><strong>Task Title: &nbsp;</strong></p>
                                                 <p class="mb-0" id="task-title-{{ $task->id }}">{{ $task->Task_title }}</p>
                                            </div>
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
                                                    <form action="{{ route('tasks.duplicate', $task->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        <!-- JavaScript-triggered form submission -->
                                                        <a href="javascript:void(0);"
                                                           class="dropdown-item"
                                                           onclick="if (confirm('Are you sure you want to duplicate this task?')) this.closest('form').submit();">
                                                            Duplicate
                                                        </a>
                                                    </form>
                                                    <a class="dropdown-item" href="{{ route('tasks.edit', ['id' => $task->id]) }}">Edit</a>
                                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <!-- JavaScript-triggered form submission -->
                                                        <a href="javascript:void(0);"
                                                           class="dropdown-item"
                                                           onclick="if (confirm('Are you sure you want to delete this task?')) this.closest('form').submit();">
                                                            Delete
                                                        </a>
                                                    </form>

                                                                                         </div>
                                            </div>
                                        </div>
                                        <p class="mb-1"><strong>Task Description: &nbsp;</strong></p>
                                        <h6 class="mb-3" id="task-desc-{{ $task->id }}">{{ $task->Task_desc }}</h6>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0">
                                                <strong>Deadline:</strong>
                                            </p>
                                                <span class="align-content-right" id="task-deadline-{{ $task->id }}">{{ $task->Deadline }}</span>
                                        </div>
                                        <div class="mb-0 d-flex justify-content-between align-items-center">
                                            <p><strong>Requested by:</strong></p>
                                            <p>{{ $task->creator->name }}</p>
                                        </div>
                                        <div class="mb-0 d-flex justify-content-between align-items-center">
                                            <p><strong>Responsible Person:</strong></p>
                                            @if ($task->name)
                                                <p class="justify-content-between align-content-right">{{ $task->user->name }}</p>
                                            @else
                                                <form action="{{ route('tasks.take', $task->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary btn-sm justify-content-between align-content-right ">Take Task</button>
                                                </form>
                                            @endif
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <p class="mb-0"><strong>Priority:</strong></p>
                                            <p class="mb-0">
                                                @if ($task->Priority == "1")
                                                    <span id="task-Priority-{{ $task->id }}" class="badge rounded-pill bg-success">Low</span>
                                                @elseif ($task->Priority == "2")
                                                    <span id="task-Priority-{{ $task->id }}" class="badge rounded-pill bg-warning">Moderate</span>
                                                @elseif ($task->Priority == "3")
                                                    <span id="task-Priority-{{ $task->id }}" class="badge rounded-pill bg-danger">High</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div>
                                            @if(isset($task->file_path) && $task->file_path)
                                                <a href="{{ asset('storage/' . $task->file_path) }}" target="_blank" class="position-relative">
                                                    <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7366 2.76176H8.08455C6.00455 2.75276 4.29955 4.41076 4.25055 6.49076V17.3398C4.21555 19.3898 5.84855 21.0808 7.89955 21.1168C7.96055 21.1168 8.02255 21.1168 8.08455 21.1148H16.0726C18.1416 21.0938 19.8056 19.4088 19.8026 17.3398V8.03976L14.7366 2.76176Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M14.4731 2.75V5.659C14.4731 7.079 15.6221 8.23 17.0421 8.234H19.7961" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M14.2926 13.7471H9.39258" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                    <!-- Badge for the number of files -->
                                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                                                        {{ $task->files_count ?? 1 }}
                                                    </span>
                                                </a>
                                            @else
                                                <i>No files uploaded</i>
                                            @endif
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card-transparent mb-0 desk-info">
            <div class="card-body p-0">
                <div class="row">

                    <div class="group1-wrap">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5>Finished <strong>({{ $close_Active }})</strong></h5>
                        </div>

                        @foreach ($tasksGrouped->get('close', collect()) as $task)
                        <div class="group" id="group{{ $task->id }}">
                            <div class="col-lg-12 group__item">
                                <div class="card" id="task-card-{{ $task->id }}">
                                    <div class="card-body">
                                        <div class="d-grid grid-flow-col align-items-center justify-content-between mb-2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="mb-0"><strong>Task Title: &nbsp;</strong></p>
                                                 <p class="mb-0" id="task-title-{{ $task->id }}">{{ $task->Task_title }}</p>
                                            </div>
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
                                                    <form action="{{ route('tasks.duplicate', $task->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        <!-- JavaScript-triggered form submission -->
                                                        <a href="javascript:void(0);"
                                                           class="dropdown-item"
                                                           onclick="if (confirm('Are you sure you want to duplicate this task?')) this.closest('form').submit();">
                                                            Duplicate
                                                        </a>
                                                    </form>
                                                    <a class="dropdown-item" href="{{ route('tasks.edit', ['id' => $task->id]) }}">Edit</a>
                                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <!-- JavaScript-triggered form submission -->
                                                        <a href="javascript:void(0);"
                                                           class="dropdown-item"
                                                           onclick="if (confirm('Are you sure you want to delete this task?')) this.closest('form').submit();">
                                                            Delete
                                                        </a>
                                                    </form>

                                                    @if (session('success'))
                                                        <div class="alert alert-success">
                                                            {{ session('success') }}
                                                        </div>
                                                    @endif                                            </div>
                                            </div>
                                        </div>
                                        <p class="mb-1"><strong>Task Description: &nbsp;</strong></p>
                                        <h6 class="mb-3" id="task-desc-{{ $task->id }}">{{ $task->Task_desc }}</h6>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0">
                                                <strong>Deadline:</strong>
                                            </p>
                                                <span class="align-content-right" id="task-deadline-{{ $task->id }}">{{ $task->Deadline }}</span>
                                        </div>
                                        <div class="mb-0 d-flex justify-content-between align-items-center">
                                            <p><strong>Requested by:</strong></p>
                                            <p>{{ $task->creator->name }}</p>
                                        </div>
                                        <div class="mb-0 d-flex justify-content-between align-items-center">
                                            <p><strong>Responsible Person:</strong></p>
                                            @if ($task->name)
                                                <p class="justify-content-between align-content-right">{{ $task->user->name }}</p>
                                            @else
                                                <form action="{{ route('tasks.take', $task->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary btn-sm justify-content-between align-content-right ">Take Task</button>
                                                </form>
                                            @endif
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <p class="mb-0"><strong>Priority:</strong></p>
                                            <p class="mb-0">
                                                @if ($task->Priority == "1")
                                                    <span id="task-Priority-{{ $task->id }}" class="badge rounded-pill bg-success">Low</span>
                                                @elseif ($task->Priority == "2")
                                                    <span id="task-Priority-{{ $task->id }}" class="badge rounded-pill bg-warning">Moderate</span>
                                                @elseif ($task->Priority == "3")
                                                    <span id="task-Priority-{{ $task->id }}" class="badge rounded-pill bg-danger">High</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div>
                                            @if(isset($task->file_path) && $task->file_path)
                                                <a href="{{ asset('storage/' . $task->file_path) }}" target="_blank" class="position-relative">
                                                    <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7366 2.76176H8.08455C6.00455 2.75276 4.29955 4.41076 4.25055 6.49076V17.3398C4.21555 19.3898 5.84855 21.0808 7.89955 21.1168C7.96055 21.1168 8.02255 21.1168 8.08455 21.1148H16.0726C18.1416 21.0938 19.8056 19.4088 19.8026 17.3398V8.03976L14.7366 2.76176Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M14.4731 2.75V5.659C14.4731 7.079 15.6221 8.23 17.0421 8.234H19.7961" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M14.2926 13.7471H9.39258" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                            @else
                                                <i>No files uploaded</i>
                                            @endif
                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection()
