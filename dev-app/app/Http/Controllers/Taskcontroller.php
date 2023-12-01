<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class Taskcontroller extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:4',
            'description' => 'required|min:5',

        ]);

        $task = new Task;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->save();

        return redirect()->route('adminTasks')->with('success', 'Se ha creado exitosamente');
    }

    public function indexadmins()
    {
        $tasks = Task::all();
        return view('adminTasks', ['tasks' => $tasks]);
    }
    public function update(Request $request, $id)
    {

        $task = Task::find($id);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->save();
        return redirect()->route('adminTasks')->with('success', 'Se ha actualizado con exito');
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('adminTasks')->with('success', 'Se ha eliminado con exito');
    }
    public function index()
    {
        $tasks = Task::all();
        return view('tasks', ['tasks' => $tasks]);
    }
}
