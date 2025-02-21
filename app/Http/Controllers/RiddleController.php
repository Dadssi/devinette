<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riddle;

class RiddleController extends Controller
{
    public function index()
    {
        $riddles = Riddle::all();
        return view('riddles.index', compact('riddles'));
    }

    public function create()
    {
        return view('riddles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Riddle::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('riddles.index');
    }

    public function show($id)
    {
        $riddle = Riddle::findOrFail($id);
        return view('riddles.show', compact('riddle'));
    }

    public function edit($id)
    {
        $riddle = Riddle::findOrFail($id);
        return view('riddles.edit', compact('riddle'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $riddle = Riddle::findOrFail($id);
        $riddle->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('riddles.index');
    }

    public function destroy($id)
    {
        Riddle::destroy($id);
        return redirect()->route('riddles.index');
    }
    
}
