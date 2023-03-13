<?php

namespace App\Http\Controllers;

use App\Models\Fisherman;
use Illuminate\Http\Request;

class FishermanController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    public function index()
    {
        $fisherman = Fisherman::all();
        return response()->json([
            'status' => 'masuk',
            'data' => $fisherman
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'tim_id' => 'required|integer',
            'phone' => 'required|unique:fisherman,phone|numeric',
            'email' => 'required|email|unique:fisherman,email',
            'password' => 'required|min:6',
            'gender' => 'required|in:male,female',
            'birth_date' => 'required|date',
            'location_id' => 'required|integer',
            'status' => 'required|in:aktif,non-aktif',
            'experience' => 'required|integer',
            'nik' => 'required|unique:fisherman,nik|numeric',
            'image' => 'required',
            'identity_photo' => 'required',
        ]);

        $fisherman = Fisherman::create($validatedData);
        $fisherman->save();

        return response()->json([
            'status' => 'success',
            'data' => $fisherman
        ]);
    }

    public function show(Fisherman $fisherman)
    {
        return response()->json([
            'status' => 'success',
            'data' => $fisherman
        ]);
    }

    public function update(Request $request, Fisherman $fisherman)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required',
            'phone' => 'sometimes|required|unique:fisherman,phone,' . $fisherman->id . '|numeric',
            'email' => 'sometimes|required|email|unique:fisherman,email,' . $fisherman->id,
            'password' => 'sometimes|required|min:6',
            'gender' => 'sometimes|required|in:male,female',
            'birth_date' => 'sometimes|required|date',
            'status' => 'sometimes|required|in:aktif,non-aktif',
            'experience' => 'sometimes|required|integer',
            'nik' => 'sometimes|required|unique:fisherman,nik,' . $fisherman->id . '|numeric',
            'image' => 'sometimes|required|file|mimes:jpeg,jpg,png',
            'identity_photo' => 'sometimes|required|file|mimes:jpeg,jpg,png',
        ]);

        $fisherman->update($validatedData);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->get();
            $fisherman->image = $image;
        }

        if ($request->hasFile('identity_photo')) {
            $identity_photo = $request->file('identity_photo')->get();
            $fisherman->identity_photo = $identity_photo;
        }

        $fisherman->save();

        return response()->json([
            'status' => 'success',
            'data' => $fisherman
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fisherman  $fisherman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fisherman $fisherman)
    {
        $fisherman->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Fisherman deleted successfully'
        ]);
    }
}
