<?php
namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create()
    {
        return view('tasks.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Task::create([
            'task'        => $request->title,
            'description' => $request->description,
            'user_id'     => auth()->id(),
            'status'      => 'pending',
        ]);

        return redirect()->route('dashboard');
    }

    public function taskList()
    {
        $allTask = Task::where('user_id', auth()->id())
            ->where('status', 'pending')
            ->get();

        return view('dashboard', compact('allTask'));
    }

    public function markAsComplete($id)
    {
        $task         = Task::findOrFail($id);
        $task->status = 'completed';
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
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $task              = Task::findOrFail($id);
        $task->task        = $request->title;
        $task->description = $request->description;
        $task->save();

        return redirect()->route('dashboard');
    }
    public function history()
    {
        $tasks = Task::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy(function ($data) {
                return Carbon::parse($data->created_at)->format('Y-m-d');
            });
        return view('tasks.history', compact('tasks'));
    }
}
