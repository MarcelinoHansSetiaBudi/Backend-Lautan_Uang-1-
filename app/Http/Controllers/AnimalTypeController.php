<?php

namespace App\Http\Controllers;
use App\Models\AnimalType;
use Illuminate\Http\Request;

class AnimalTypeController extends Controller
{
    public function index()
    {
        $animaltype = AnimalType::all();
        return response()->json([
            'status' => 'success',
            'data' => $animaltype
        ]);
    }

    // Menampilkan data berdasarkan ID
    public function show($id)
    {
        $animaltype = AnimalType::find($id);
        if (!$animaltype) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $animaltype
        ]);
    }

    // Menambahkan data baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        $animaltype = AnimalType::create($validatedData);

        return response()->json([
            'status' => 'success',
            'data' => $animaltype
        ]);
    }
     

    // Mengubah data
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required'
        ]);

        $animaltype = AnimalType::find($id);
        if (!$animaltype) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        $animaltype->update($validatedData);

        return response()->json([
            'status' => 'success',
            'data' => $animaltype
        ]);
    }

    // Menghapus data
    public function destroy($id)
    {
        $animaltype = AnimalType::find($id);
        if (!$animaltype) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        $animaltype->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data deleted successfully'
        ]);
    }
}
