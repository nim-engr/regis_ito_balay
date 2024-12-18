"use strict";

const open = document.getElementById("open");
const progress = document.getElementById("progress");
const review = document.getElementById("review");
const close = document.getElementById("close");
const groups = ['open','progress','review','close']
const sortableSpeed = 150;
const taskCards = document.querySelectorAll('.task-card');
const columns = document.querySelectorAll('.group');

const updateTaskStatus = (taskId, newStatus) => {
    fetch('/update-task-status', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            id: taskId,
            status: newStatus
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log(`Task ${taskId} status updated to ${newStatus}`);
        } else {
            console.error('Failed to update task status');
        }
    })
    .catch(error => console.error('Error:', error));
};

const sortable1 = Sortable.create(open, {
  group: {
    name: "open",
    put: groups
  },
  cursor: 'move',
  animation: sortableSpeed,

  onMove: function(evt) {

    const dropGroup = evt.to;
    progress.classList.add("adding");
  },
  onSort: function(evt) {
    console.log('evt.item.id:', evt.item.id);
    evt.from.classList.remove("adding");
  },
  onEnd: function(evt)
  {
    const cardId = evt.item.id;
    const taskId = cardId.replace('task-card-', '');
    const newStatus = evt.to.id;
    console.log(`Task ID: ${taskId}, New Status: ${newStatus}`);
    updateTaskStatus(taskId, newStatus);
    evt.to.classList.remove("adding");
  },
  filter: ".remove",
  onFilter: function(evt) {
    const item = evt.item,
      ctrl = evt.target;
    if (Sortable.utils.is(ctrl, ".remove")) {
      $(item).slideUp('400', function() {
         $(item).remove();
      });
    }
  }
});

const sortable2 = Sortable.create(progress, {
  group: {
    name: "progress",
    put: groups
  },
  cursor: 'move',
  animation: sortableSpeed,

  onSort: function(evt) {
    evt.to.classList.remove("adding");
  },
  onEnd: function(evt)
  {
      // 1️⃣ Get the ID of the card that was dragged (extract the number from 'task-card-7')
      const cardId = evt.item.id; // Example: 'task-card-7'
      const taskId = cardId.replace('task-card-', ''); // Extracts '7' from 'task-card-7'

      // 2️⃣ Get the ID of the new group where the card was dropped
      const newStatus = evt.to.id; // Example: 'close', 'progress', 'review'

      // 3️⃣ Console log the task ID and new status
      console.log(`Task ID: ${taskId}, New Status: ${newStatus}`);

      // 4️⃣ Call the function to update the task status in the backend
      updateTaskStatus(taskId, newStatus);

      // 5️⃣ Remove any glow effect
      evt.to.classList.remove("adding");
  }
});

const sortable3 = Sortable.create(review, {
  group: {
    name: "review",
    put: groups
  },
  cursor: 'move',
  animation: sortableSpeed,
  onMove: function(evt) {
    const dropGroup = evt.to;
    dropGroup.classList.add("adding");
    evt.from.classList.remove("adding");
  },
  onSort: function(evt) {
    evt.from.classList.remove("adding");
  },
  onEnd: function(evt)
  {
      // 1️⃣ Get the ID of the card that was dragged (extract the number from 'task-card-7')
      const cardId = evt.item.id; // Example: 'task-card-7'
      const taskId = cardId.replace('task-card-', ''); // Extracts '7' from 'task-card-7'

      // 2️⃣ Get the ID of the new group where the card was dropped
      const newStatus = evt.to.id; // Example: 'close', 'progress', 'review'

      // 3️⃣ Console log the task ID and new status
      console.log(`Task ID: ${taskId}, New Status: ${newStatus}`);

      // 4️⃣ Call the function to update the task status in the backend
      updateTaskStatus(taskId, newStatus);

      // 5️⃣ Remove any glow effect
      evt.to.classList.remove("adding");
  }
});

const sortable4 = Sortable.create(close, {
  group: {
    name: "close",
    put: groups
  },
  cursor: 'move',
  animation: sortableSpeed,
  onMove: function(evt) {
    const dropGroup = evt.to;
    dropGroup.classList.add("adding");
    evt.from.classList.remove("adding");
  },
  onSort: function(evt) {
    evt.from.classList.remove("adding");
  },
  onEnd: function(evt)
  {
      // 1️⃣ Get the ID of the card that was dragged (extract the number from 'task-card-7')
      const cardId = evt.item.id; // Example: 'task-card-7'
      const taskId = cardId.replace('task-card-', ''); // Extracts '7' from 'task-card-7'

      // 2️⃣ Get the ID of the new group where the card was dropped
      const newStatus = evt.to.id; // Example: 'close', 'progress', 'review'

      // 3️⃣ Console log the task ID and new status
      console.log(`Task ID: ${taskId}, New Status: ${newStatus}`);

      // 4️⃣ Call the function to update the task status in the backend
      updateTaskStatus(taskId, newStatus);

      // 5️⃣ Remove any glow effect
      evt.to.classList.remove("adding");
  }
});

if (!Element.prototype.matches) {
    Element.prototype.matches = Element.prototype.msMatchesSelector;
}
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
function confirmDuplicate(taskId) {
    swalWithBootstrapButtons.fire({
          title: "Duplicate",
          text: "Are you sure you want to duplicate this task?",
          icon: "info",
          showCancelButton: true,
          confirmButtonText: "Yes, Duplicate task!",
          cancelButtonText: "No, cancel!",
          reverseButtons: false
    }).then((result) => {
        if (result.isConfirmed) {
            // Ensure form exists before submission
            const form = document.getElementById(`duplicate-task-form-${taskId}`);
            if (form) {
                form.submit();
            } else {
                console.error(`Form with ID Duplicate-task-form-${taskId} not found.`);
            }
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire({
                title: "Duplicate",
                text: "Duplication Cancelled",
                icon: "error"
            });
        }
    });
}
