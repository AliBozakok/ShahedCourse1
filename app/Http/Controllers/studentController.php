<?php

namespace App\Http\Controllers;

use App\Http\Requests\studentRequest;
use App\Models\Student;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students= Student::all();
        return response()->json(['data'=> $students]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(studentRequest $request)
    {
        try{
        $input= $request->validated();
        Student::create($input);
        return response()->json(['message'=>'creating new student successfully']);
    }
    catch(Exception $e)
    {
        return response()->json(['message'=>'Error creating new student '],500);
    }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);
        return response()->json(['data'=>$student]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(studentRequest $request, string $id)
    {
        try{
        $input= $request->validated();
        $student= Student::findOrFail($id);
        $student->update($input);
        return response()->json(['message'=>'student is updated successfully']);
      }
      catch(Exception $e)
      {
        return response()->json(['message'=>'student updated Error'],500);
       }
      }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student= Student::findOrFail($id);
        $student->isActive=0;
        $student->isDismissed=1;
        $student->save();
        return response()->json(['message'=>'student is deleted successfully']);

    }

    public function Grd(String $id)
    {
        $student= Student::findOrFail($id);
        $student->isActive=0;
        $student->isGraduated=1;
        $student->save();
        return response()->json(['message'=>'student is Graduated ']);
    }
}
