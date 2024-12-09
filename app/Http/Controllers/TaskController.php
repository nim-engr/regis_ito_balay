<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User; // Assuming you have a `Task` model
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Save a new task
     */

     public function task_save(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'Task_title' => 'required|string|max:255',
            'Task_desc'  => 'required|string',
            'name'       => 'nullable|string|max:255',
            'file'       => 'nullable|file', // Optional file upload
            'Deadline'   => 'required|date',
            'urgent'     => 'required|boolean',
        ]);

        // Handle validation failure
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Check if the task already exists
        $exists = Task::where('Task_title', $request->Task_title)
            ->where('Task_desc', $request->Task_desc)
            ->where('name', $request->name)
            ->where('Deadline', $request->Deadline)
            ->where('urgent', $request->urgent)
            ->exists();

        if ($exists) {
            return redirect()
                ->back()
                ->with('error', 'Task Already Added')
                ->withInput();
        }

        // Save the task to the database
        $task = new Task();
        $task->Task_title = $request->Task_title;
        $task->Task_desc = $request->Task_desc;
        $task->name = $request->name;
        $task->Deadline = $request->Deadline;
        $task->urgent = $request->urgent;

        // Handle file upload
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('tasks', 'public'); // Save in `storage/app/public/tasks`
            $task->file = $filePath;
        }

        if ($task->save()) {
            return redirect()
                ->route('tasklist') // Redirect to task list
                ->with('success', 'Task Successfully Added');
        }

        return redirect()
            ->back()
            ->with('error', 'Error in adding task')
            ->withInput();           // Keep old input
    }

    /**
     * Show add task form
     */
    public function add_task()
    {
        $users = User::all();
        return view('layouts.add_task', compact('users'));
    }

    /**
     * Show task list
     */
    public function tasklist()
    {
        // Fetch all tasks
        $taskData = Task::all();

        // Fetch all users, indexed by their IDs for quick lookup
        $users = User::all()->keyBy('id');

        // Map over tasks and add `user_name` dynamically
        $taskData = $taskData->map(function ($task) use ($users) {
            // Dynamically set the user_name property based on the user's ID
            $task->user_name = $users->get($task->name)->name ?? 'Unassigned';
            return $task;
        });

        // Count tasks by status
        $tasks = task::where('status', 'open')  ->get();
        $task_Active = $tasks->count(); // Fetch all tasks from the database
        $progress = task::where('status', 'progress')  ->get();
        $progress_Active = $progress->count(); // Fetch all tasks from the database
        $review = task::where('status', 'review')  ->get();
        $review_Active = $review->count(); // Fetch all tasks from the database
        $close = task::where('status', 'close')  ->get();
        $close_Active = $close->count(); // Fetch all tasks from the database

        // Pass data to the view
        return view('layouts.tasklist', compact('tasks', 'task_Active', 'progress_Active', 'review_Active', 'close_Active', 'users', 'taskData', 'progress','review','close'));
    }    public function edit($id)
    {
        $task = Task::findOrFail($id); // Find the task by ID or throw a 404 error
        $users = User::all();
        return view('layouts.edit', compact('task',  'users')); // Return the edit view with task data
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Task_title' => 'required|string|max:255',
            'Task_desc' => 'required|string',
            'name' => 'required|string|max:255',
            'Deadline' => 'required|date',
            'urgent' => 'nullable|boolean',
        ]);

        $task = Task::findOrFail($id); // Find the task by ID or throw 404
        $task->Task_title = $request->Task_title;
        $task->Task_desc = $request->Task_desc;
        $task->name = $request->name;
        $task->Deadline = $request->Deadline;
        $task->urgent = $request->boolean('urgent'); // Convert checkbox to boolean
        $task->save(); // Save changes

        return redirect()->route('tasklist')->with('success', 'Task updated successfully!');
    }



}
