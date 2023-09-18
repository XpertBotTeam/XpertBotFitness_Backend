<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exercise;
use App\Http\Requests\ExerciseRequest;



class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = $request->get('per_page',25);
        $exercises = Exercise::paginate($per_page);
        return response()->json($exercises);
    }   

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExerciseRequest $request)
    {
        $exercise = Exercise::create($request->all());
        return response()->json($exercise,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $exercise = Exercise::findOrFail($id);
        return response()->json($exercise);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(ExerciseRequest $request, string $id)
    {
        $exercise = Exercise::findOrFail($id);
        $exercise->update($request->all());
        return response()->json($exercise);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $exercise = Exercise::findOrFail($id);
       $exercise->delete();
       return response()->json(null,204);
    }
}
