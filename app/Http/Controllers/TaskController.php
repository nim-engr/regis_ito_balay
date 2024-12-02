<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; // Assuming you have a `Task` model
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
            'name'       => 'required|string|max:255',
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
        return view('layouts.add_task');
    }

    /**
     * Show task list
     */
    public function tasklist()
    {
        $tasks = Task::all(); // Fetch all tasks from the database
        return view('layouts.tasklist', compact('tasks'));
    }
}
