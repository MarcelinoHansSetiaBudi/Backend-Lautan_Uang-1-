<?php

namespace App\Http\Controllers;

use App\Models\CategoryOperationalCost;
use Illuminate\Http\Request;

class CategoryOperationalCostController extends Controller
{
    public function index()
    {
        $categoryoperationalCost = CategoryOperationalCost::all();
        return response()->json([
            'status' => 'success',
            'data' => $categoryoperationalCost
        ]);
    }

    // Menampilkan data berdasarkan ID
    public function show($id)
    {
        $categoryoperationalCost = CategoryOperationalCost::find($id);
        if (!$categoryoperationalCost) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $categoryoperationalCost
        ]);
    }

    // Menambahkan data baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $categoryoperationalCost = CategoryOperationalCost::create($validatedData);

        return response()->json([
            'status' => 'success',
            'data' => $categoryoperationalCost
        ], 201);
    }
     

    // Mengubah data
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required',
            'description' => 'sometimes|required|'
        ]);

        $categoryoperationalCost = CategoryOperationalCost::find($id);
        if (!$categoryoperationalCost) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        $categoryoperationalCost->update($validatedData);

        return response()->json([
            'status' => 'success',
            'data' => $categoryoperationalCost
        ]);
    }

    // Menghapus data
    public function destroy($id)
    {
        $categoryoperationalCost = CategoryOperationalCost::find($id);
        if (!$categoryoperationalCost) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        $categoryoperationalCost->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data deleted successfully'
        ]);
    }
}
