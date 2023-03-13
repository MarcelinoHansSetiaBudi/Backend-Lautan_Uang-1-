<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $paymentmethod = PaymentMethod::all();
        return response()->json([
            'status' => 'success',
            'data' => $paymentmethod
        ]);
    }

    // Menampilkan data berdasarkan ID
    public function show($id)
    {
        $paymentmethod = PaymentMethod::find($id);
        if (!$paymentmethod) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $paymentmethod
        ]);
    }

    // Menambahkan data baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $paymentmethod = PaymentMethod::create($validatedData);

        return response()->json([
            'status' => 'success',
            'data' => $paymentmethod
        ], 201);
    }
     

    // Mengubah data
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required',
            'description' => 'sometimes|required'
        ]);

        $paymentmethod = PaymentMethod::find($id);
        if (!$paymentmethod) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        $paymentmethod->update($validatedData);

        return response()->json([
            'status' => 'success',
            'data' => $paymentmethod
        ]);
    }

    // Menghapus data
    public function destroy($id)
    {
        $paymentmethod = PaymentMethod::find($id);
        if (!$paymentmethod) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        $paymentmethod->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data deleted successfully'
        ]);
    }
}
