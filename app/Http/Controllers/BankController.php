<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index()
    {
        $bank = Bank::all();
        return response()->json([
            'status' => 'success',
            'data' => $bank
        ]);
    }

    // Menampilkan data berdasarkan ID
    public function show($id)
    {
        $bank = Bank::find($id);
        if (!$bank) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $bank
        ]);
    }

    // Menambahkan data baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $bank = Bank::create($validatedData);

        return response()->json([
            'status' => 'success',
            'data' => $bank
        ], 201);
    }
     

    // Mengubah data
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required'
        ]);

        $bank = Bank::find($id);
        if (!$bank) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        $bank->update($validatedData);

        return response()->json([
            'status' => 'success',
            'data' => $bank
        ]);
    }

    // Menghapus data
    public function destroy($id)
    {
        $bank = Bank::find($id);
        if (!$bank) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        $bank->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data deleted successfully'
        ]);
    }
}
