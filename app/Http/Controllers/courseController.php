<?php

namespace App\Http\Controllers;

use App\Http\Requests\courseRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class courseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses= Course::all();
        return response()->json(['data'=> $courses ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(courseRequest $request)
    {
        $input= $request->validated();
        Course::create($input);
        return response()->json(['message'=>'course is added Successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course= Course::findOrFail($id);
        return response()->json(['data'=> $course]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(courseRequest $request, string $id)
    {
      $input= $request->validated();
      $course= Course::findOrFail($id);
      $course->update($input);

      return response()->json(['message'=>'course is updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $course= Course::findOrFail($id);
       $course->delete();
       return response()->json(['message'=>'course is deleted successfully']);
    }
}
