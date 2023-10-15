<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Workout;
use App\Http\Requests\WorkoutRequest;
class WorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(WorkoutRequest $request)
    {
       $per_page = $request->get('per_page',25);
       $workouts = Workout::paginate($per_page);
       return response()->json($workouts);
    }

   

    /**
     * Store a newly created resource in storage.
     */
    public function store(WorkoutRequest $request)
    {
        $workout = Workout::create($request->all());
        return response()->json($workout,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $workout = Workout::findOrFail($id);
        return response()->json($workout);

    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $workout = Workout:: findOrFail($id);
        $workout ->update($request->all());
        return response()->lson($workout);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $workout = Workout::findOrFail($id);
        $workout->delete();
        return response()->json(null,204);
    }
}
