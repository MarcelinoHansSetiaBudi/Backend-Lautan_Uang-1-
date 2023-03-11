<?php

namespace App\Http\Controllers;

use App\Models\FishermanCatch;
use Illuminate\Http\Request;

class FishermanCatchController extends Controller
{
    public function index()
    {
        $fishermancatch = FishermanCatch::all();
        return response()->json([
            'status' => 'success',
            'data' => $fishermancatch
        ]);
    }

    // Menampilkan data berdasarkan ID
    public function show($id)
    {
        $fishermancatch = FishermanCatch::find($id);
        if (!$fishermancatch) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $fishermancatch
        ]);
    }

    // Menambahkan data baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'weight' => 'required|integer'
        ]);

        $fishermancatch = FishermanCatch::create($validatedData);

        return response()->json([
            'status' => 'success',
            'data' => $fishermancatch
        ], 201);
    }
     

    // Mengubah data
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'weight' => 'required|integer'
        ]);

        $fishermancatch = FishermanCatch::find($id);
        if (!$fishermancatch) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        $fishermancatch->update($validatedData);

        return response()->json([
            'status' => 'success',
            'data' => $fishermancatch
        ]);
    }

    // Menghapus data
    public function destroy($id)
    {
        $fishermancatch = FishermanCatch::find($id);
        if (!$fishermancatch) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        $fishermancatch->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data deleted successfully'
        ]);
    }
}
