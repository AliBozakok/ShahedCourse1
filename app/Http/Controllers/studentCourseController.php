<?php

namespace App\Http\Controllers;

use App\Http\Resources\studentCourseResource;
use App\Models\StudentCourse;
use Illuminate\Http\Request;
use App\Models\Student;

class studentCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentCourse= StudentCourse::all();
        return studentCourseResource::collection($studentCourse);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input= $request->validate([
            'studentId'=>'required |numeric',
            'cousreId'=>'required |numeric',
            'mark'=>'required |numeric'
        ]);
        StudentCourse::create($input);
        return response()->json(['message'=>'StudentCourse is Added Successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $studentCourse= StudentCourse::findOrFail($id);
        return new studentCourseResource($studentCourse);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input= $request->validate([
            'studentId'=>'required |numeric',
            'cousreId'=>'required |numeric',
            'mark'=>'required |numeric'
        ]);
        $studentCourse= StudentCourse::findOrFail($id);
        $studentCourse->update($input);
        return response()->json(['message'=>'StudentCourse is Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $studentCourse= StudentCourse::findOrFail($id);
        $studentCourse->delete();
        return response()->json(['message'=>'StudentCourse is deleted Successfully']);
    }
    }

