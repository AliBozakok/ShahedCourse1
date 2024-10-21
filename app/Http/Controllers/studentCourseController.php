<?php

namespace App\Http\Controllers;

use App\Http\Resources\studentCourseResource;
use App\Models\StudentCourse;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
