<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoListController extends Controller
{
    public function index()
    {
        $lists = Auth::user()->lists()->withCount('tasks')->get();
        return view('lists.index', compact('lists'));
    }

    public function create()
    {
        return view('lists.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        Auth::user()->lists()->create(['name' => $request->name]);
        return redirect()->route('lists.index')->with('success', 'List berhasil dibuat!');
    }

    public function show(TodoList $list)
    {
        if ($list->user_id !== Auth::id()) abort(403);
        $tasks = $list->tasks()->orderByRaw("FIELD(priority, 'high', 'medium', 'low')")->get();
        return view('lists.show', compact('list', 'tasks'));
    }

    public function edit(TodoList $list)
    {
        if ($list->user_id !== Auth::id()) abort(403);
        return view('lists.edit', compact('list'));
    }

    public function update(Request $request, TodoList $list)
    {
        if ($list->user_id !== Auth::id()) abort(403);
        $request->validate(['name' => 'required|string|max:255']);
        $list->update(['name' => $request->name]);
        return redirect()->route('lists.show', $list)->with('success', 'List berhasil diupdate!');
    }

    public function destroy(TodoList $list)
    {
        if ($list->user_id !== Auth::id()) abort(403);
        $list->delete();
        return redirect()->route('lists.index')->with('success', 'List berhasil dihapus!');
    }
}