<?php

namespace App\Http\Controllers;
use App\Models\AnimalTypeDetail;
use Illuminate\Http\Request;

class AnimalTypeDetailController extends Controller
{
    public function index()
    {
        $animaltypeDetail = AnimalTypeDetail::all();
        return response()->json([
            'status' => 'success',
            'data' => $animaltypeDetail
        ]);
    }

    // Menampilkan data berdasarkan ID
    public function show($id)
    {
        $animaltypeDetail = AnimalTypeDetail::find($id);
        if (!$animaltypeDetail) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $animaltypeDetail
        ]);
    }

    // Menambahkan data baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'price' => 'required'
        ]);

        $animaltypeDetail = AnimalTypeDetail::create($validatedData);

        return response()->json([
            'status' => 'success',
            'data' => $animaltypeDetail
        ], 201);
    }
     

    // Mengubah data
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'price' => 'required'
        ]);

        $animaltypeDetail = AnimalTypeDetail::find($id);
        if (!$animaltypeDetail) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        $animaltypeDetail->update($validatedData);

        return response()->json([
            'status' => 'success',
            'data' => $animaltypeDetail
        ]);
    }

    // Menghapus data
    public function destroy($id)
    {
        $animaltypeDetail = AnimalTypeDetail::find($id);
        if (!$animaltypeDetail) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        $animaltypeDetail->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data deleted successfully'
        ]);
    }
}
