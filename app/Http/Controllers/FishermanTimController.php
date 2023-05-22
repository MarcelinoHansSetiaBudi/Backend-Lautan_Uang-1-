<?php

namespace App\Http\Controllers;

use App\Models\FishermanTim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    // public function getFishermanTimByProvince(Request $request)
    // {
    //     $locationId = $request->input('location_id');
    //     $data = FishermanTim::where('location_id', $locationId)->get();
    
    //     return response()->json([
    //         'status' => 'success',
    //         'data' => $data
    //     ]); 
    // }

    public function getFishermanTimByProvince(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'location_id' => 'required|integer'
        ]);

        // Ambil location_id dari inputan
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 400);
        }

        $locationId = $request->input('location_id');

        // Query untuk mendapatkan tim nelayan berdasarkan location_id
        $timNelayan = FishermanTim::where('location_id', $locationId)->get();
    
        // Mengecek apakah terdapat tim nelayan yang ditemukan
        if ($timNelayan->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tidak ada tim nelayan yang ditemukan untuk location_id ' . $locationId,
            ]);
        }
    
        return response()->json([
            'status' => 'success',
            'data' => $timNelayan
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
