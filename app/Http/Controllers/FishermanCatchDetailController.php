<?php

namespace App\Http\Controllers;

use App\Models\FishermanCatchDetail;
use Illuminate\Http\Request;

class FishermanCatchDetailController extends Controller
{
    public function index()
    {
        $fishermancatchDetail = FishermanCatchDetail::all();
        return response()->json([
            'status' => 'success',
            'data' => $fishermancatchDetail
        ]);
    }

    // Menampilkan data berdasarkan ID
    public function show($id)
    {
        $fishermancatchDetail = FishermanCatchDetail::find($id);
        if (!$fishermancatchDetail) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $fishermancatchDetail
        ]);
    }

    // Menambahkan data baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'animal_type_id' => 'required|integer',
            'fishing_catch_id' => 'required|integer',
            'price' => 'required|integer'
        ]);

        $fishermancatchDetail = FishermanCatchDetail::create($validatedData);

        return response()->json([
            'status' => 'success',
            'data' => $fishermancatchDetail
        ], 201);
    }
     

    // Mengubah data
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required',
            'animal_type_id' => 'sometimes|required|integer',
            'fishing_catch_id' => 'sometimes|required|integer',
            'price' => 'sometimes|required|integer'
        ]);

        $fishermancatchDetail = FishermanCatchDetail::find($id);
        if (!$fishermancatchDetail) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        $fishermancatchDetail->update($validatedData);

        return response()->json([
            'status' => 'success',
            'data' => $fishermancatchDetail
        ]);
    }

    // Menghapus data
    public function destroy($id)
    {
        $fishermancatchDetail = FishermanCatchDetail::find($id);
        if (!$fishermancatchDetail) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        $fishermancatchDetail->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data deleted successfully'
        ]);
    }
}

