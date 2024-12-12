<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    /**
     * Save a new task
     */
    public function task_save(Request $request)
    {
        $request->validate([
            'Task_title' => 'required|string|max:255',
            'Task_desc' => 'required|string',
            'name' => 'nullable|exists:users,id',
            'file' => 'nullable|file|max:2048', // File size limit (2MB)
            'Deadline' => 'required|date',
            'Priority' => 'required|in:1,2,3',
        ]);

        $exists = Task::where('Task_title', $request->Task_title)
            ->where('Task_desc', $request->Task_desc)
            ->where('name', $request->name)
            ->where('Deadline', $request->Deadline)
            ->where('Priority', $request->Priority)
            ->exists();

        if ($exists) {
            return redirect()
                ->back()
                ->with('error', 'Task Already Added')
                ->withInput();
        }

        $task = new Task();
        $task->Task_title = $request->Task_title;
        $task->Task_desc = $request->Task_desc;
        $task->name = $request->name;
        $task->Deadline = $request->Deadline;
        $task->Priority = $request->Priority;
        $task->created_by = Auth::id();

        // Handle file upload
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('tasks', 'public'); // Save in `storage/app/public/tasks`
            $task->file_name = $request->file('file')->getClientOriginalName();
            $task->file_path = $filePath;
            $task->file_size = $request->file('file')->getSize();
            $task->file_type = $request->file('file')->getMimeType();
        }

        if ($task->save()) {
            return redirect()->route('tasklist')->with('success', 'Task Successfully Added');
        }

        return redirect()->back()->with('error', 'Error in adding task')->withInput();
    }

    /**
     * Show the task creation form
     */
    public function add_task()
    {
        $users = User::all();
        return view('layouts.add_task', compact('users'));
    }

    /**
     * Display the list of tasks
     */
    public function tasklist()
    {
        $tasksGrouped = Task::with(['user', 'creator'])->get()->groupBy('status');
        $task_Active = $tasksGrouped->get('open', collect())->count();
        $progress_Active = $tasksGrouped->get('progress', collect())->count();
        $review_Active = $tasksGrouped->get('review', collect())->count();
        $close_Active = $tasksGrouped->get('close', collect())->count();

        return view('layouts.tasklist', compact('tasksGrouped', 'task_Active', 'progress_Active', 'review_Active', 'close_Active'));
    }

    /**
     * Show the edit form for a task
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $users = User::all();
        return view('layouts.edit', compact('task', 'users'));
    }

    /**
     * Update a task
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Task_title' => 'required|string|max:255',
            'Task_desc' => 'required|string',
            'name' => 'nullable|exists:users,id',
            'Deadline' => 'required|date',
            'Priority' => 'required|in:1,2,3',
            'file' => 'nullable|file|max:2048',
        ]);

        $task = Task::findOrFail($id);
        $task->Task_title = $request->Task_title;
        $task->Task_desc = $request->Task_desc;
        $task->name = $request->input('name');
        $task->Deadline = $request->Deadline;
        $task->Priority = $request->Priority;

        // Handle file upload
        if ($request->hasFile('file')) {
            if ($task->file_path && Storage::exists($task->file_path)) {
                Storage::delete($task->file_path); // Delete the old file
            }

            $filePath = $request->file('file')->store('tasks', 'public');
            $task->file_name = $request->file('file')->getClientOriginalName();
            $task->file_path = $filePath;
            $task->file_size = $request->file('file')->getSize();
            $task->file_type = $request->file('file')->getMimeType();
        }

        $task->save();

        return redirect()->route('tasklist')->with('success', 'Task updated successfully!');
    }

    /**
     * Assign task to logged-in user
     */
    public function takeTask($id)
    {
        $task = Task::findOrFail($id);

        if ($task->name === null) {
            $task->name = Auth::id();
            $task->save();

            return redirect()->back()->with('success', 'You have taken the task.');
        }

        return redirect()->back()->with('error', 'Task is already assigned.');
    }

    /**
     * Delete a task
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        // Delete file if it exists
        if ($task->file_path && Storage::exists($task->file_path)) {
            Storage::delete($task->file_path);
        }

        $task->delete();

        return redirect()->back()->with('success', 'Task deleted successfully.');
    }

    /**
     * Duplicate a task
     */
    public function duplicate($id)
    {
        $originalTask = Task::findOrFail($id);
        $duplicatedTask = $originalTask->replicate();
        $duplicatedTask->Task_title = $originalTask->Task_title . ' (Duplicated)';
        $duplicatedTask->created_by = Auth::id();
        $duplicatedTask->status = 'open';
        $duplicatedTask->save();

        return redirect()->back()->with('success', 'Task duplicated successfully!');
    }
}
