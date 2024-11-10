<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validate([
            'student_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $experience = Experience::create($data);

        return response()->json($experience, 201);
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        $experience = Experience::findOrFail($id);

        return response()->json($experience);
    }

    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $data = $request->validate([
            'student_id' => 'integer',
            'name' => 'string|max:255',
            'position' => 'string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $experience = Experience::findOrFail($id);
        $experience->update($data);

        return response()->json($experience);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $experience = Experience::findOrFail($id);
        $experience->delete();

        return response()->json(['message' => 'Experience deleted successfully.']);
    }
}
