<?php

namespace App\Http\Controllers;

use App\Exports\ExhibitExport;
use App\Http\Resources\Exhibit\ExhibitCollection;
use App\Http\Resources\Exhibit\ExhibitResource;
use App\Models\Exhibit;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use CSV;

class ExhibitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exhibits = Exhibit::all();
        if (is_null($exhibits) || count($exhibits) === 0) {
            return response()->json('No exhibits found!', 404);
        }
        return response()->json([
            'exhibits' => new ExhibitCollection($exhibits)
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

    public function exportCSV()
    {
        return CSV::download(new ExhibitExport, 'exhibits.csv');
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
            'name' =>  'required|string|max:255',
            'description' =>  'required|string|max:255',
            'date' =>  'required|date',
            'gallery_id' =>  'required|integer|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $gallery = Gallery::find($request->gallery_id);
        if (is_null($gallery)) {
            return response()->json('Gallery not found', 404);
        }

        $exhibit = Exhibit::create([
            'name' => $request->name,
            'description' => $request->description,
            'date' => $request->date,
            'gallery_id' => $request->gallery_id,
        ]);

        return response()->json([
            'Exhibit created' => new ExhibitResource($exhibit)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exhibit  $exhibit
     * @return \Illuminate\Http\Response
     */
    public function show($exhibit_id)
    {
        $exhibit = Exhibit::find($exhibit_id);
        if (is_null($exhibit)) {
            return response()->json('Exhibit not found', 404);
        }
        return response()->json(new ExhibitResource($exhibit));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exhibit  $exhibit
     * @return \Illuminate\Http\Response
     */
    public function edit(Exhibit $exhibit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exhibit  $exhibit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exhibit $exhibit)
    {
        $validator = Validator::make($request->all(), [
            'name' =>  'required|string|max:255',
            'description' =>  'required|string|max:255',
            'date' =>  'required|date',
            'gallery_id' =>  'required|integer|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $gallery = Gallery::find($request->gallery_id);
        if (is_null($gallery)) {
            return response()->json('Gallery not found', 404);
        }

        $exhibit->name = $request->name;
        $exhibit->description = $request->description;
        $exhibit->date = $request->date;
        $exhibit->gallery_id = $request->gallery_id;

        $exhibit->save();

        return response()->json([
            'Exhibit updated' => new ExhibitResource($exhibit)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exhibit  $exhibit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exhibit $exhibit)
    {
        $exhibit->delete();
        return response()->json('Exhibit deleted');
    }
}
