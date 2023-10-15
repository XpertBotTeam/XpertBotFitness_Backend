<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coach;
use App\Http\Requests\CoachRequest;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;



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

    public function uploadImage(Request $request){
        $path = $request->image->move(public_path('assets/images'));
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
    public function storeImage(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
        ]);

        // Get the file from the request
        $image = $request->file('image');

        // Generate a unique name for the file
        $imageName = time() . '_' . $image->getClientOriginalName();

        // Move the file to the public/uploads directory
        $image->move(public_path('uploads'), $imageName);

        // Optionally, you can store the file path in the database
        // $filePath = 'uploads/' . $imageName;
        // YourModel::create(['image_path' => $filePath]);

        return back()
            ->with('success', 'Image uploaded successfully.')
            ->with('imageName', $imageName);
    }
}
