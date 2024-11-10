<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        $students = Student::all();
        return response()->json(['data' => $students]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'nt_id' => 'required|int',
            'photo' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'profession' => 'nullable|string',
            'biography' => 'nullable|string',
        ]);

        $student = Student::create($validatedData);

        return response()->json(['data' => $student], 201);
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        $student = Student::findOrFail($id);
        return response()->json($student);
    }


    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $student = Student::findOrFail($id);

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'nt_id' => 'required|int',
            'photo' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'profession' => 'nullable|string',
            'biography' => 'nullable|string',
        ]);

        $student->update($validated);

        return response()->json($student);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $student = Student::findOrFail($id);

        $student->delete();

        return response()->json(null, 204);
    }
}
