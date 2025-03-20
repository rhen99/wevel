<?php

namespace App\Http\Controllers;

use App\Models\Novel;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;

class ChapterController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth")->except('show');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Novel $novel)
    {
        if ($novel->user_id !== auth()->user()->id) {
            return redirect()->back();
        }
        return view("chapter.create")->with("novel", $novel);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Novel $novel)
    {
        if ($novel->user_id !== auth()->user()->id) {
            return redirect()->back();
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string|ascii',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $novel->chapters()->create([
            "title" => $request->title,
            "content" => $request->content,
            "chapter_number" => $novel->chapters()->count() + 1
        ]);

        return redirect()->route('home')->with(["success", "Chapter Created"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $_, string $chapter_id)
    {
        $chapter = Chapter::find($chapter_id);

        return view('chapter.show')->with('chapter', $chapter);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Novel $novel, string $chapter_id)
    {
        if ($novel->user_id !== auth()->user()->id) {
            return redirect()->back();
        }
        $chapter = $novel->chapters()->find($chapter_id);

        return view("chapter.edit", compact("chapter", "novel"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Novel $novel, string $id)
    {
        if ($novel->user_id !== auth()->user()->id) {
            return redirect()->back();
        }
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'string|ascii',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $chapter = Chapter::find($id);

        $chapter->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        return redirect()->route('home')->with(["success", "Novel Updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Novel $novel, string $id)
    {
        if ($novel->user_id !== auth()->user()->id) {
            return redirect()->back();
        }

        Chapter::find($id)->delete();

        return redirect()->back()->with(["type" => "success", "message" => "Chapter Deleted"]);
    }
}
