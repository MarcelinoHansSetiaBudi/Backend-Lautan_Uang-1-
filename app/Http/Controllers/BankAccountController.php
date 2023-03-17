<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    public function index()
    {
        $bankaccount = BankAccount::all();
        return response()->json([
            'status' => 'success',
            'data' => $bankaccount
        ]);
    }

    // Menampilkan data berdasarkan ID
    public function show($id)
    {
        $bankaccount = BankAccount::find($id);
        if (!$bankaccount) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $bankaccount
        ]);
    }

    // Menambahkan data baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $bankaccount = BankAccount::create($validatedData);

        return response()->json([
            'status' => 'success',
            'data' => $bankaccount
        ], 201);
    }
     

    // Mengubah data
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required'
        ]);

        $bankaccount = BankAccount::find($id);
        if (!$bankaccount) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        $bankaccount->update($validatedData);

        return response()->json([
            'status' => 'success',
            'data' => $bankaccount
        ]);
    }

    // Menghapus data
    public function destroy($id)
    {
        $bankaccount = BankAccount::find($id);
        if (!$bankaccount) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        $bankaccount->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data deleted successfully'
        ]);
    }
}