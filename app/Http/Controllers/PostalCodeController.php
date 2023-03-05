<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostalCode;

class PostalCodeController extends Controller
{
    public function index()
    {
        $postalCodes = PostalCode::all();
        return response()->json([
            'status' => 'success',
            'data' => $postalCodes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required|max:255'
        ]);

        $postalCode = PostalCode::create($request->all());
        return response()->json([
            'status' => 'success',
            'data' => $postalCode
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postalCode = PostalCode::find($id);

        if (!$postalCode) {
            return response()->json([
                'status' => 'error',
                'message' => 'Postal code not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $postalCode
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required|max:255'
        ]);

        $postalCode = PostalCode::find($id);

        if (!$postalCode) {
            return response()->json([
                'status' => 'error',
                'message' => 'Postal code not found'
            ], 404);
        }

        $postalCode->name = $request->name;
        $postalCode->description = $request->description;
        $postalCode->save();

        return response()->json([
            'status' => 'success',
            'data' => $postalCode
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postalCode = PostalCode::find($id);

        if (!$postalCode) {
            return response()->json([
                'status' => 'error',
                'message' => 'Postal code not found'
            ], 404);
        }

        $postalCode->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Postal code deleted'
        ]);
    }
}
