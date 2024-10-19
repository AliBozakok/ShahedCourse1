<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
    {
        try{
        $input= $request->validate([
            'name'=> 'required | string',
            'no'=>'required',
            'email' => 'required | email',
            'password'=> 'required',
            'imgUrl'=> 'nullable | mimes:png,jpg'
        ]);
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
