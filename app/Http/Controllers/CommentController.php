<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Chapter $chapter)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required|string|ascii',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = auth()->user();

        $user->comments()->create([
            'content' => $request->content,
            'name' => $user->name,
            'username' => $user->username,
            'chapter_id' => $chapter->id

        ]);

        return redirect()->back();
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chapter $chapter, string $id)
    {
        $user = auth()->user();

        $comment = $chapter->comments()->find($id);

        if ($comment->user_id !== auth()->user()->id) {
            return redirect()->back()->with(["error", "Unauthorized Action"]);
        }
        $validator = Validator::make($request->all(), [
            'content' => 'required|string|ascii',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $comment->update([
            "content" => $request->content
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chapter $chapter, string $id)
    {
        $comment = $chapter->comments()->find($id);

        if ($comment->user_id !== auth()->user()->id) {
            return redirect()->back()->with(["error", "Unauthorized Action"]);
        }
        $comment->delete();
        return redirect()->back();
    }
}
