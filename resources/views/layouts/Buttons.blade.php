<div>
    <a href="javascript:void(0);" id="task-{{ $task->id }}" class="position-relative">
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

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const taskId = "{{ $task->id }}"; // Dynamic task ID from Laravel
        const userId = "{{ Auth::id() }}"; // Current authenticated user ID
        const csrfToken = "{{ csrf_token() }}"; // CSRF Token for Laravel

        document.querySelector(`#task-${taskId}`).addEventListener('click', async function() {
            // Fetch existing comments for the task
            let commentsHtml = "No comments yet.";
            try {
                const response = await fetch("{{ route('get.comments') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": csrfToken
                    },
                    body: JSON.stringify({ task_id: taskId })
                });

                const result = await response.json();
                if (result.success && result.comments.length > 0) {
                    commentsHtml = result.comments
                        .map(comment => `User ${comment.user_id}: ${comment.comment_text}`)
                        .join("<br>");
                }
            } catch (error) {
                commentsHtml = "Error loading comments.";
            }

            // Display the SweetAlert2 modal
            const { value: text } = await Swal.fire({
                title: "New Comment",
                html: `
                    <div style="text-align: left; margin-bottom: 10px;">
                        <strong>Previous Comments:</strong>
                        <div style="max-height: 150px; overflow-y: auto; border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
                            ${commentsHtml}
                        </div>
                        <textarea id="new-comment" placeholder="Type your message here..." aria-label="Type your message here" style="width: 100%; height: 100px; border: 1px solid #ccc; border-radius: 4px;"></textarea>
                    </div>
                `,
                showCancelButton: true,
                focusConfirm: false,
                preConfirm: () => {
                    const newComment = document.getElementById("new-comment").value;
                    return newComment ? newComment : null;
                }
            });

            if (text) {
                // Send AJAX request to save the new comment
                try {
                    const saveResponse = await fetch("{{ route('save.comment') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": csrfToken
                        },
                        body: JSON.stringify({
                            task_id: taskId,
                            user_id: userId,
                            comment_text: text
                        })
                    });

                    const saveResult = await saveResponse.json();

                    if (saveResult.success) {
                        Swal.fire("Success", saveResult.message, "success");
                    } else {
                        Swal.fire("Error", saveResult.message, "error");
                    }
                } catch (error) {
                    Swal.fire("Error", "There was an error saving your comment.", "error");
                }
            }
        });
    });
</script>


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