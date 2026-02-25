<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\Log;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $films = Movie::all();
        return response()->json($films,200,options:JSON_UNESCAPED_UNICODE);
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
            "string" => ":attribute mezőnek szövegnek kell lennie.",
            "integer" => ":attribute mezőnek számnak kell lennie.",
            "required" => ":attribute kötelező mező.",
            "title.min" => ":attribute mezőnek minimum ennyinek kell lennie: :min.",
            "length.min" => ":attribute mezőnek minimum ennyinek kell lennie: :min.",
            "genre.min" => ":attribute mezőnek minimum ennyinek kell lennie: :min."
        ],[
            "title" => "Cím",
            "length" => "Hossz",
            "genre"=> "Műfaj"
        ]);
        try{
            $movie = Movie::create($request->all());
            return response()->json(["message"=> "Sikeres feltöltés"],201,options:JSON_UNESCAPED_UNICODE);
        } catch(\Exception $e)
        {
            Log::info($e->getMessage());
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
