<?php

namespace App\Http\Controllers;

use App\Models\FishermanTim;
use Illuminate\Http\Request;

class FishermanTimController extends Controller
{
    public function index()
    {
        $fishermanTims = FishermanTim::with('location', 'location.postalCode')->get();
        return response()->json([
            'status' => 'success',
            'data' => $fishermanTims
        ]);
    }

    // Menampilkan data berdasarkan ID
    public function show($id)
    {
        $fishermanTim = FishermanTim::find($id);
        if (!$fishermanTim) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $fishermanTim
        ]);
    }

    // Menambahkan data baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'year_formed' => 'required|integer',
            'address' => 'required',
            'balance' => 'required|integer',
            'location_id' => 'required|integer',
            'quantity' => 'required|integer',
            'total_assets' => 'required|integer',
            'divident_yield' => 'nullable|numeric',
            'debt_to_equity_ratio' => 'nullable|numeric',
            'market_cap' => 'nullable|integer',
        ]);

        $fishermanTim = FishermanTim::create($validatedData);

        return response()->json([
            'status' => 'success',
            'data' => $fishermanTim
        ], 201);
    }
     

    // Mengubah data
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'year_formed' => 'required|integer',
            'address' => 'required',
            'balance' => 'required|integer',
            'location_id' => 'required|integer',
            'quantity' => 'required|integer',
            'total_assets' => 'required|integer',
            'divident_yield' => 'nullable|numeric',
            'debt_to_equity_ratio' => 'nullable|numeric',
            'market_cap' => 'nullable|integer',
        ]);

        $fishermanTim = FishermanTim::find($id);
        if (!$fishermanTim) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        $fishermanTim->update($validatedData);

        return response()->json([
            'status' => 'success',
            'data' => $fishermanTim
        ]);
    }

    // Menghapus data
    public function destroy($id)
    {
        $fishermanTim = FishermanTim::find($id);
        if (!$fishermanTim) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        $fishermanTim->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data deleted successfully'
        ]);
    }
}
