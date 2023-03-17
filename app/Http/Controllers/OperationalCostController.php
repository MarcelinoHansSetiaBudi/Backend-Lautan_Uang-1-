<?php

namespace App\Http\Controllers;

use App\Models\OperationalCost;
use Illuminate\Http\Request;

class OperationalCostController extends Controller
{
    public function index()
    {
        $operationalcost = OperationalCost::all();
        return response()->json([
            'status' => 'success',
            'data' => $operationalcost
        ]);
    }

    // Menampilkan data berdasarkan ID
    public function show($id)
    {
        $operationalcost = OperationalCost::find($id);
        if (!$operationalcost) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $operationalcost
        ]);
    }

    // Menambahkan data baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fisherman_tim_id' => 'required|integer',
            'date' => 'required|date',
            'amount' => 'required',
            'category_id' => 'required|integer',
            'description' => 'required',
            'payment_method_id' => 'required|integer',
            'vendor' => 'required',
            'receipt_photo' => 'required'
        ]);

        $operationalcost = OperationalCost::create($validatedData);

        return response()->json([
            'status' => 'success',
            'data' => $operationalcost
        ], 201);
    }
     

    // Mengubah data
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'fisherman_tim_id' => 'sometimes|required|integer',
            'date' => 'sometimes|required|date',
            'amount' => 'sometimes|required|integer',
            'category_id' => 'sometimes|required|integer',
            'description' => 'sometimes|required',
            'payment_method_id' => 'sometimes|required|integer',
            'vendor' => 'sometimes|required',
            'receipt_photo' => 'sometimes|required'
        ]);

        $operationalcost = OperationalCost::find($id);
        if (!$operationalcost) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        $operationalcost->update($validatedData);

        return response()->json([
            'status' => 'success',
            'data' => $operationalcost
        ]);
    }

    // Menghapus data
    public function destroy($id)
    {
        $operationalcost = OperationalCost::find($id);
        if (!$operationalcost) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        $operationalcost->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data deleted successfully'
        ]);
    }
}
