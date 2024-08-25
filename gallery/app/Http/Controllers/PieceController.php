<?php

namespace App\Http\Controllers;

use App\Http\Resources\Piece\PieceCollection;
use App\Http\Resources\Piece\PieceResource;
use App\Models\Artist;
use App\Models\Exhibit;
use App\Models\Piece;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PieceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pieces = Piece::all();
        if (is_null($pieces) || count($pieces) === 0) {
            return response()->json('No pieces found!', 404);
        }
        return response()->json([
            'pieces' => new PieceCollection($pieces)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' =>  'required|string|max:255',
            'price' =>  'required|integer',
            'description' =>  'required|string|max:255',
            'artist_id' =>  'required|integer|max:255',
            'exhibit_id' =>  'required|integer|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $artist = Artist::find($request->artist_id);
        if (is_null($artist)) {
            return response()->json('Artist not found', 404);
        }

        $exhibit = Exhibit::find($request->exhibit_id);
        if (is_null($exhibit)) {
            return response()->json('Exhibit not found', 404);
        }

        $piece = Piece::create([
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'artist_id' => $request->artist_id,
            'exhibit_id' => $request->exhibit_id,
        ]);

        return response()->json([
            'Piece created' => new PieceResource($piece)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function show($piece_id)
    {
        $piece = Piece::find($piece_id);
        if (is_null($piece)) {
            return response()->json('Piece not found', 404);
        }
        return response()->json(new PieceResource($piece));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function edit(Piece $piece)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Piece $piece)
    {
        $validator = Validator::make($request->all(), [
            'title' =>  'required|string|max:255',
            'price' =>  'required|integer',
            'description' =>  'required|string|max:255',
            'artist_id' =>  'required|integer|max:255',
            'exhibit_id' =>  'required|integer|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $artist = Artist::find($request->artist_id);
        if (is_null($artist)) {
            return response()->json('Artist not found', 404);
        }

        $exhibit = Exhibit::find($request->exhibit_id);
        if (is_null($exhibit)) {
            return response()->json('Exhibit not found', 404);
        }

        $piece->title = $request->title;
        $piece->price = $request->price;
        $piece->description = $request->description;
        $piece->artist_id = $request->artist_id;
        $piece->exhibit_id = $request->exhibit_id;

        $piece->save();

        return response()->json([
            'Piece updated' => new PieceResource($piece)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function destroy(Piece $piece)
    {
        $piece->delete();
        return response()->json('Piece deleted');
    }
}
