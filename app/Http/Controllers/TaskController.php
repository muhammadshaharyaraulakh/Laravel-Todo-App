<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{


public function create(){
    return view('tasks.create');
}

        public function history(){
    $allTask = Task::where('user_id', auth()->id())->get();
    return view('tasks.history', compact('allTask'));
}


    public function store(Request $request)
   {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Task::create([
            'task' => $request->title,
            'description' => $request->description,
            'user_id' => auth()->id(),
        ]);
        return redirect()->route(auth()->check() ? 'dashboard' : 'login');
   }
   public function taskList()
{
    $allTask = Task::where('user_id', auth()->id())
                   ->where('is_done', false)
                   ->get();

    return view('dashboard', compact('allTask'));
}
public function markAsComplete($id)
{
    $task = Task::findOrFail($id);
    $task->is_done = true;
    $task->save();

    return redirect()->route('dashboard');

}
public function destroy($id)
{
    $task = Task::findOrFail($id);
    $task->delete();

    return redirect()->route('dashboard');
}
public function edit($id)
{
    $task = Task::findOrFail($id);
    return view('tasks.edit', compact('task'));

}
public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    $task = Task::findOrFail($id);
    $task->task = $request->title;
    $task->description = $request->description;
    $task->user_id = auth()->id();

    // ✅ Do NOT touch is_done
    $task->save();

    return redirect()->route('dashboard');
}

}