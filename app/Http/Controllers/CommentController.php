<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Riddle;

class CommentController extends Controller
{
    public function store(Request $request, Riddle $riddle)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'riddle_id' => $riddle->id,
            'content' => $request->content,
        ]);

        return redirect()->route('riddles.show', $riddle->id);
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        if (auth()->id() !== $comment->user_id) {
            return redirect()->back()->with('error', 'Vous ne pouvez pas supprimer ce commentaire.');
        }

        $comment->delete();

        return redirect()->back();
    }
}
