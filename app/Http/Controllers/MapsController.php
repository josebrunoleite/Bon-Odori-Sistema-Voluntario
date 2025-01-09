<?php

namespace App\Http\Controllers;

use App\Models\Points;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MapsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
    */
    public function view()
    {
        return view('maps.index');
    }
    public function index()
    {
       $points = Points::all();
       return response()->json($points);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maps.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Criar um novo ponto
    public function store(Request $request)
    {
        $data = $request->all();

        dd($data);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'variables' => 'nullable|array',
        ]);

        $point = PointS::create($validated);

        return response()->json(['message' => 'Point created!', 'data' => $point], 201);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'variables' => 'nullable|array',
        ]);

        $point = PointS::findOrFail($id);
        $point->update($validated);

        return response()->json(['message' => 'Point updated!', 'data' => $point]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Points  $Points
     * @return \Illuminate\Http\Response
     */
    public function destroy(Points $Points)
    {
        //
    }
}
