<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;


class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();

        return response()->json([
            'status' => 'success',
            'data' => $locations
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'country_name' => 'required',
            'province_name' => 'required',
            'kota_kab_name' => 'required',
            'kecamatan_name' => 'required',
            'kelurahan_des_name' => 'required',
            'postal_code_id' => 'required'
        ]);

        $location = new Location([
            'country_name' => $request->input('country_name'),
            'province_name' => $request->input('province_name'),
            'kota_kab_name' => $request->input('kota_kab_name'),
            'kecamatan_name' => $request->input('kecamatan_name'),
            'kelurahan_des_name' => $request->input('kelurahan_des_name'),
            'postal_code_id' => $request->input('postal_code_id')
        ]);

        $location->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Location created successfully'
        ]);
    }

    public function show($id)
    {
        $location = Location::find($id);

        if (!$location) {
            return response()->json([
                'status' => 'error',
                'message' => 'Location not found'
            ]);
        }

        return response()->json([
            'status' => 'success',
            'data' => $location
        ]);
    }

    public function update(Request $request, $id)
    {
        $location = Location::find($id);

        if (!$location) {
            return response()->json([
                'status' => 'error',
                'message' => 'Location not found'
            ]);
        }

        $request->validate([
            'country_name' => 'required',
            'province_name' => 'required',
            'kota_kab_name' => 'required',
            'kecamatan_name' => 'required',
            'kelurahan_des_name' => 'required',
            'postal_code_id' => 'required'
        ]);

        $location->country_name = $request->input('country_name');
        $location->province_name = $request->input('province_name');
        $location->kota_kab_name = $request->input('kota_kab_name');
        $location->kecamatan_name = $request->input('kecamatan_name');
        $location->kelurahan_des_name = $request->input('kelurahan_des_name');
        $location->postal_code_id = $request->input('postal_code_id');
        $location->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Location updated successfully'
        ]);
    }

    public function destroy($id)
    {
        $location = Location::find($id);

        if (!$location) {
            return response()->json([
                'status' => 'error',
                'message' => 'Location not found'
            ], 404);
        }

        try {
            $location->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Location deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unable to delete location'
            ], 500);
        }
    }
}
