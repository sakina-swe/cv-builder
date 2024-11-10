<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Language::all(), 200);
    }

    public function show(Language $language): \Illuminate\Http\JsonResponse
    {
        return response()->json($language, 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:languages,name',
            'level' => 'required|string|max:255',
        ]);

        $language = Language::create($data);

        return response()->json(['data' => $language], 201);
    }

    public function update(Request $request, Language $language): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:languages,name|max:255',
        ]);

        $language->update($validatedData);

        return response()->json($language, 200);
    }

    public function destroy(Language $language): \Illuminate\Http\JsonResponse
    {
        $language->delete();

        return response()->json(null, 200);
    }
}
