<?php

namespace App\Http\Controllers;

use App\Models\AssetsDetail;
use Illuminate\Http\Request;

class AssetsDetailController extends Controller
{
    public function index()
    {
        $assetsdetail = AssetsDetail::all();
        return response()->json([
            'status' => 'success',
            'data' => $assetsdetail
        ]);
    }

    // Menampilkan data berdasarkan ID
    public function show($id)
    {
        $assetsdetail = AssetsDetail::find($id);
        if (!$assetsdetail) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $assetsdetail
        ]);
    }

    // Menambahkan data baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'quantity' => 'required|integer',
            'purchase_date' => 'required|date'
        ]);

        $assetsdetail = AssetsDetail::create($validatedData);

        return response()->json([
            'status' => 'success',
            'data' => $assetsdetail
        ], 201);
    }
     

    // Mengubah data
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required',
            'quantity' => 'sometimes|required|integer',
            'price' => 'sometimes|required|integer',
            'purchase_date' => 'sometimes|required|date'
        ]);

        $assetsdetail = AssetsDetail::find($id);
        if (!$assetsdetail) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        $assetsdetail->update($validatedData);

        return response()->json([
            'status' => 'success',
            'data' => $assetsdetail
        ]);
    }

    // Menghapus data
    public function destroy($id)
    {
        $assetsdetail = AssetsDetail::find($id);
        if (!$assetsdetail) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        $assetsdetail->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data deleted successfully'
        ]);
    }
}
