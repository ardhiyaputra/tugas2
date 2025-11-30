<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TodoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function create(TodoList $list)
    {
        if ($list->user_id !== Auth::id()) abort(403);
        return view('tasks.create', compact('list'));
    }

    public function store(Request $request, TodoList $list)
    {
        if ($list->user_id !== Auth::id()) abort(403);
        $request->validate([
            'name' => 'required|string|max:255',
            'priority' => 'required|in:low,medium,high',
            'deadline' => 'nullable|date|after_or_equal:today'
        ]);
        
        $list->tasks()->create([
            'name' => $request->name,
            'description' => $request->description,
            'priority' => $request->priority,
            'deadline' => $request->deadline,
            'status' => 'pending'
        ]);
        
        return redirect()->route('lists.show', $list)->with('success', 'Task berhasil ditambahkan!');
    }

    public function edit(TodoList $list, Task $task)
    {
        if ($list->user_id !== Auth::id()) abort(403);
        return view('tasks.edit', compact('list', 'task'));
    }

    public function update(Request $request, TodoList $list, Task $task)
    {
        if ($list->user_id !== Auth::id()) abort(403);
        $request->validate([
            'name' => 'required|string|max:255',
            'priority' => 'required|in:low,medium,high',
            'deadline' => 'nullable|date'
        ]);
        
        $task->update([
            'name' => $request->name,
            'description' => $request->description,
            'priority' => $request->priority,
            'deadline' => $request->deadline
        ]);
        
        return redirect()->route('lists.show', $list)->with('success', 'Task berhasil diupdate!');
    }

    public function toggle(TodoList $list, Task $task)
    {
        if ($list->user_id !== Auth::id()) abort(403);
        $task->update(['status' => $task->status === 'completed' ? 'pending' : 'completed']);
        return back()->with('success', 'Status task berhasil diubah!');
    }

    public function destroy(TodoList $list, Task $task)
    {
        if ($list->user_id !== Auth::id()) abort(403);
        $task->delete();
        return back()->with('success', 'Task berhasil dihapus!');
    }
}