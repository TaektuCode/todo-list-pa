<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        $todos = Todo::orderBy('id', 'DESC')->get();
        return view('merkliste', compact('todos'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'beschreibung' => 'required',
            'datum' => 'required',
            'uhrzeit' => 'required',
        ]);

        Todo::create($validatedData);

        return redirect('/');
    }

    public function edit(Todo $todo)
    {
        return view('edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'beschreibung' => 'required',
        'datum' => 'required',
        'uhrzeit' => 'required',
    ]);

    $todo->update($validatedData);

    return redirect('/');
}

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect('/');
    }

    
}
