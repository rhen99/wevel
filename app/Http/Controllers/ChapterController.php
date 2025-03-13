<?php

namespace App\Http\Controllers;

use App\Models\Novel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Novel $novel)
    {
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
            'content' => 'string|ascii',
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
