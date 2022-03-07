<?php

namespace App\Http\Controllers\ToDoApp;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\ToDoApp\Task;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $tasks = Auth::user()->tasks;
        return view('todoapp.tasks.list', compact('tasks'));
    }

    public function add()
    {
        return view('todoapp.tasks.add');
    }

    public function add_post(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
            'details' => 'required',
        ]);

        $new_task = new Task;
        $new_task->name = $request->name;
        $new_task->details = $request->details;
        $new_task->user_id = Auth::id();
        $new_task->save();

        return redirect()->route('todoapp.all_tasks');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        if ($task->user->id != Auth::id()) {
            return redirect()->route('home');
        }

        return view('todoapp.tasks.edit', compact('task'));
    }

    public function edit_post(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
            'details' => 'required',
        ]);

        $task = Task::findOrFail($request->id);
        if ($task->user->id != Auth::id()) {
            return redirect()->route('home');
        }
        $task->name = $request->name;
        $task->details = $request->details;
        $task->save();

        return redirect()->route('todoapp.all_tasks');
    }

    public function complete(Request $request)
    {
        $task = Task::findOrFail($request->id);
        if ($task->user->id != Auth::id()) {
            return redirect()->route('home');
        }
        $task->is_complete = 1;
        $task->save();

        return redirect()->route('todoapp.all_tasks');
    }

    public function not_complete(Request $request)
    {
        $task = Task::findOrFail($request->id);
        if ($task->user->id != Auth::id()) {
            return redirect()->route('home');
        }
        $task->is_complete = 0;
        $task->save();

        return redirect()->route('todoapp.all_tasks');
    }

    public function delete(Request $request)
    {
        $task = Task::findOrFail($request['id']);
        if ($task->user->id != Auth::id()) {
            return redirect()->route('home');
        }
        $task->delete();
        
        return redirect()->route('todoapp.all_tasks');
    }
}
