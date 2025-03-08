<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Novel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NovelController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $genres = [
            'fantasy' => 'Fantasy',
            'sci_fi' => 'Science Fiction',
            'mystery' => 'Mystery',
            'thriller' => 'Thriller',
            'romance' => 'Romance',
            'horror' => 'Horror',
            'historical' => 'Historical Fiction',
            'adventure' => 'Adventure',
            'dystopian' => 'Dystopian',
            'slice_of_life' => 'Slice of Life',
            'drama' => 'Drama',
            'action' => 'Action',
            'comedy' => 'Comedy',
            'supernatural' => 'Supernatural',
            'lit_rpg' => 'LitRPG',
            'martial_arts' => 'Martial Arts',
            'psychological' => 'Psychological',
            'cyberpunk' => 'Cyberpunk',
            'steampunk' => 'Steampunk',
            'tragedy' => 'Tragedy',
            'isekai' => 'Isekai',
            'mecha' => 'Mecha',
            'wuxia' => 'Wuxia',
            'xianxia' => 'Xianxia',
            'xuanhuan' => 'Xuanhuan',
            'sports' => 'Sports',
            'mature' => 'Mature',
            'harem' => 'Harem',
            'reverse_harem' => 'Reverse Harem'
        ];
        return view("auth.create", compact("genres"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'string|max:255|ascii',
            'genres' => 'required|array|min:1',
            'genres.*' => 'string|in:fantasy,sci_fi,mystery,thriller,romance,horror,action,comedy,slice_of_life,drama,adventure,dystopian,sports,mature,harem,reverse_harem'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $genresArray = $request->input('genres');

        $genresString = implode(",", $genresArray);
        $user = auth()->user();

        $user->novels()->create([
            "title" => $request->title,
            "description" => $request->description,
            "genre" => $genresString
        ]);

        return redirect()->route('home')->with(["success", "Novel Created"]);
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
