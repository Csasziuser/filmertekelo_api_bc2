<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
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
            "name" => "required|string|min:1|max:255",
            "movie_id" => "required|integer|exists:movies,id",
            "score" => "required|integer|between:1,10"
        ],[
            "required" => ":attribute mezőt kötelező megadni",
            "integer" => ":attribute mező szám legyen",
            "string" => ":attribute mezőnek szövegnek kell lennie",
            "exists" => ":attribute mezőbe létező film ID-ját kell megadni",
            "min" => ":attribute mezőnek minimum :min hosszúak kell lennie",
            "max" => ":attribute mezőnek maximum :max hosszú lehet",
            "between" => ":attribute mező :min és :max értékek között kell lennie"
        ], [
            "name" => "Név",
            "movie_id" => "Film ID",
            "score" => "Értékelés"
        ]);
        $rating = Rating::create($validated);
        return response()->json(["success" => true, "message" => "Az értékelés létrehozva a következő ID-val: ".$rating->id],201,options:JSON_UNESCAPED_UNICODE);
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
