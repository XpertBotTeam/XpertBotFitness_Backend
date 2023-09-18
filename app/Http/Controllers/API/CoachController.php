<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coach;
use App\Http\Requests\CoachRequest;




class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) 
    {
        $per_page = $request->get('per_page',25);
        $coaches = Coach::paginate($per_page);
        return response()->json($coaches);

    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(CoachRequest $request)
    { 
        $coach = Coach::create($request->all());
        return response()->json($coach,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $coach = Coach::findOrFail($id);
        return response()->json($coach);
    }

   

    /**
     * Update the specified resource in storage.
     */
    public function update(CoachRequest $request, string $id)
    {
        $coach = Coach::findOrFail($id);
        $coach->update($request->all());
        return response()->json($coach);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coach = Coach::findOrFail($id);
        $coach->delete();
        return response()->json(null,204);
    }
}
