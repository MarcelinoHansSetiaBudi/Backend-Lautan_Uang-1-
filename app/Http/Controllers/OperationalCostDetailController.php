<?php

namespace App\Http\Controllers;

use App\Models\OperationalCostDetail;
use Illuminate\Http\Request;

class OperationalCostDetailController extends Controller
{
    public function index()
    {
        $operationalcostDetail = OperationalCostDetail::all();
        return response()->json([
            'status' => 'success',
            'data' => $operationalcostDetail
        ]);
    }

    // Menampilkan data berdasarkan ID
    public function show($id)
    {
        $operationalcostDetail = OperationalCostDetail::find($id);
        if (!$operationalcostDetail) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $operationalcostDetail
        ]);
    }

    // Menambahkan data baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'operational_cost_id' => 'required|integer',
            'name' => 'required',
            'price_item' => 'required',
            'quantity' => 'required|integer'
        ]);

        $operationalcostDetail = OperationalCostDetail::create($validatedData);

        return response()->json([
            'status' => 'success',
            'data' => $operationalcostDetail
        ], 201);
    }
     

    // Mengubah data
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'operational_cost_id' => 'sometimes|required|integer',
            'name' => 'sometimes|required',
            'price_item' => 'sometimes|required',
            'quantity' => 'sometimes|required|integer'
        ]);

        $operationalcostDetail = OperationalCostDetail::find($id);
        if (!$operationalcostDetail) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        $operationalcostDetail->update($validatedData);

        return response()->json([
            'status' => 'success',
            'data' => $operationalcostDetail
        ]);
    }

    // Menghapus data
    public function destroy($id)
    {
        $operationalcostDetail = OperationalCostDetail::find($id);
        if (!$operationalcostDetail) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        $operationalcostDetail->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data deleted successfully'
        ]);
    }
}
