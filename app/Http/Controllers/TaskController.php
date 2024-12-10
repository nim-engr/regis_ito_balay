<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User; // Assuming you have a `Task` model
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Save a new task
     */

     public function task_save(Request $request)
    {
        $validator = Validator::make($request->all(), [ // Validation rules
            'Task_title' => 'required|string|max:255',
            'Task_desc'  => 'required|string',
            'name'       => 'nullable|string|max:255',
            'file'       => 'nullable|file', // Optional file upload
            'Deadline'   => 'required|date',
            'urgent'     => 'required|boolean',
        ]);
        if ($validator->fails()) { // Handle validation failure
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $exists = Task::where('Task_title', $request->Task_title)  // Check if the task already exists
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
        $task = new Task();       // Save the task to the database
        $task->Task_title = $request->Task_title;
        $task->Task_desc = $request->Task_desc;
        $task->name = $request->name;
        $task->Deadline = $request->Deadline;
        $task->urgent = $request->urgent;
        if ($request->hasFile('file')) {    // Handle file upload
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
    public function add_task()
    {
        $users = User::all();
        return view('layouts.add_task', compact('users'));
    }
    public function tasklist()
    {
        $tasksGrouped = Task::with('user')->get()->groupBy('status');   // Fetch tasks grouped by their statuses

        $task_Active = $tasksGrouped->get('open', collect())->count();  // Get counts for each status
        $progress_Active = $tasksGrouped->get('progress', collect())->count();
        $review_Active = $tasksGrouped->get('review', collect())->count();
        $close_Active = $tasksGrouped->get('close', collect())->count();

        return view('layouts.tasklist', compact('tasksGrouped', 'task_Active', 'progress_Active', 'review_Active', 'close_Active'));    // Pass data to the view
    }
    public function edit($id)
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
            'name' => 'nullable|exists:users,id',
            'Deadline' => 'required|date',
            'urgent' => 'nullable|boolean',
        ]);

        $task = Task::findOrFail($id); // Find the task by ID or throw 404
        $task->Task_title = $request->Task_title;
        $task->Task_desc = $request->Task_desc;
        $task->name = $request->input('name');
        $task->Deadline = $request->Deadline;
        $task->urgent = $request->boolean('urgent'); // Convert checkbox to boolean
        $task->save(); // Save changes

        return redirect()->route('tasklist')->with('success', 'Task updated successfully!');
    }
    public function takeTask($id)
    {
    $task = Task::findOrFail($id); // Find the task
    if ($task->name === null) { // Check if the task is already assigned
        $task->name = Auth::id(); // Assign task to logged-in user
        $task->save();
        return redirect()->back()->with('success', 'You have taken the task.');
    }

    return redirect()->back()->with('error', 'Task is already assigned.');
    }



}
