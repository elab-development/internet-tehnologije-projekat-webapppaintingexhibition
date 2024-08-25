<?php

namespace App\Http\Controllers;

use App\Http\Resources\Gallery\GalleryCollection;
use App\Http\Resources\Gallery\GalleryResource;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::all();
        if (is_null($galleries) || count($galleries) === 0) {
            return response()->json('No galleries found!', 404);
        }
        return response()->json([
            'galleries' => new GalleryCollection($galleries)
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
            'name' =>  'required|string|max:255|unique:galleries',
            'address' =>  'required|string|max:255',
            'founded' =>  'required|integer|between:1800,2024',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $gallery = Gallery::create([
            'name' => $request->name,
            'address' => $request->address,
            'founded' => $request->founded,
        ]);

        return response()->json([
            'Gallery created' => new GalleryResource($gallery)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show($gallery_id)
    {
        $gallery = Gallery::find($gallery_id);
        if (is_null($gallery)) {
            return response()->json('Gallery not found', 404);
        }
        return response()->json(new GalleryResource($gallery));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $validator = Validator::make($request->all(), [
            'name' =>  'required|string|max:255',
            'address' =>  'required|string|max:255',
            'founded' =>  'required|integer|between:1800,2024',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $gallery->name = $request->name;
        $gallery->address = $request->address;
        $gallery->founded = $request->founded;

        $gallery->save();

        return response()->json([
            'Gallery updated' => new GalleryResource($gallery)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return response()->json('Gallery deleted');
    }
}
