<?php

namespace App\Http\Controllers;

use App\Models\TypeAsset;
use Illuminate\Http\Request;

class TypeAssetController extends Controller
{
    public function index()
    {
        $typeasset = TypeAsset::all();
        return response()->json([
            'status' => 'success',
            'data' => $typeasset
        ]);
    }

    // Menampilkan data berdasarkan ID
    public function show($id)
    {
        $typeasset = TypeAsset::find($id);
        if (!$typeasset) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $typeasset
        ]);
    }

    // Menambahkan data baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $typeasset = TypeAsset::create($validatedData);

        return response()->json([
            'status' => 'success',
            'data' => $typeasset
        ], 201);
    }
     

    // Mengubah data
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required',
            'description' => 'sometimes|required'
        ]);

        $typeasset = TypeAsset::find($id);
        if (!$typeasset) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        $typeasset->update($validatedData);

        return response()->json([
            'status' => 'success',
            'data' => $typeasset
        ]);
    }

    // Menghapus data
    public function destroy($id)
    {
        $typeasset = TypeAsset::find($id);
        if (!$typeasset) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        $typeasset->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data deleted successfully'
        ]);
    }
}
