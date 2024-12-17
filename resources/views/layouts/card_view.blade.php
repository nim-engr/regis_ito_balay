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
                                                <form id="delete-task-form-{{ $task->id }}"
                                                    action="{{ route('tasks.destroy', $task->id) }}"
                                                    method="POST"
                                                    style="display: inline;">
                                                  @csrf
                                                  @method('DELETE')
                                                  <a href="javascript:void(0);"
                                                     class="dropdown-item"
                                                     onclick="confirmDelete({{ $task->id }})">
                                                      Delete
                                                  </a>
                                              </form>

                                              <!-- JavaScript -->
                                              <script>
                                                  const swalWithBootstrapButtons = Swal.mixin({
                                                      customClass: {
                                                          confirmButton: "btn btn-success mx-2",
                                                          cancelButton: "btn btn-danger mx-2"
                                                      },
                                                      buttonsStyling: false
                                                  });

                                                  function confirmDelete(taskId) {
                                                      swalWithBootstrapButtons.fire({
                                                            title: "Delete",
                                                            text: "You won't be able to revert this!",
                                                            icon: "warning",
                                                            showCancelButton: true,
                                                            confirmButtonText: "Yes, delete it!",
                                                            cancelButtonText: "No, cancel!",
                                                            reverseButtons: false
                                                      }).then((result) => {
                                                          if (result.isConfirmed) {
                                                              // Ensure form exists before submission
                                                              const form = document.getElementById(`delete-task-form-${taskId}`);
                                                              if (form) {
                                                                  form.submit();
                                                              } else {
                                                                  console.error(`Form with ID delete-task-form-${taskId} not found.`);
                                                              }
                                                          } else if (result.dismiss === Swal.DismissReason.cancel) {
                                                              swalWithBootstrapButtons.fire({
                                                                  title: "Cancelled",
                                                                  text: "Delete Cancelled",
                                                                  icon: "error"
                                                              });
                                                          }
                                                      });
                                                  }
                                              </script>
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
                                        <a href="{{ asset('storage/' . $task->file_path) }}" target="_blank" class="position-relative">
                                            <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M19.0714 19.0699C16.0152 22.1263 11.4898 22.7867 7.78642 21.074C7.23971 20.8539
                                                6.79148 20.676 6.36537 20.676C5.17849 20.683 3.70117 21.8339 2.93336 21.067C2.16555 20.2991 3.31726 18.8206 3.31726 17.6266C3.31726 17.2004
                                                3.14642 16.7602 2.92632 16.2124C1.21283 12.5096 1.87411 7.98269 4.93026 4.92721C8.8316 1.02443 15.17 1.02443 19.0714 4.9262C22.9797 8.83501 22.9727 15.1681 19.0714 19.0699Z"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M15.9393 12.4131H15.9483" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M11.9306 12.4131H11.9396" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M7.92128 12.4131H7.93028" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                            </a>

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

