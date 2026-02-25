<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "title" => "required|string|min:1",
            "length"=>"required|integer|min:1",
            "genre"=>"required|string|min:1",
        ],[
            "string" => ":attribute nak szövegnek kell lennie.",
            "integer" => ":attribute nak számnak kell lennie.",
            "required" => ":attribute kötelező mező.",
            "title.min" => ":attribute nak minimum ennyinek kell lennie: :min.",
            "length.min" => ":attribute nak minimum ennyinek kell lennie: :min.",
            "genre.min" => ":attribute nak minimum ennyinek kell lennie: :min."
        ],[
            "title" => "Cím",
            "length" => "Hossz",
            "genre"=> "Műfaj"
        ]);
        try{
            $movie = Movie::create($validated);
            return response()->json(["message"=> "Sikeres feltöltés"],201,options:JSON_UNESCAPED_UNICODE);
        } catch(\Exception $e)
        {
            return response()->json(["message"=> "Sikertelen feltöltés"],404,options:JSON_UNESCAPED_UNICODE);
        
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
