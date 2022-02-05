<?php

namespace App\Http\Controllers;

use App\Http\Requests\DistrictRequest;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index()
    {
        $districts = District::get(['districtName']);
        return response()->json(
            $districts,
            200
        );
    }

    public function store(DistrictRequest $request)
    {
        $newDistrict = new District();
        $newDistrict->province_id = $request['province_id'];
        $newDistrict->districtName = $request['districtName'];
        $newDistrict->save();
        return response()->json([
            'message' => 'District Registered',
            'data' => ['Districts' => $newDistrict]
        ], 200);
    }

    public function show($id)
    {
        $currentDistrict = District::find($id);
        if ($currentDistrict) {
            return response()->json(
                $currentDistrict,
                200
            );
        }
        return response()->json([
            'message' => 'No Province Found'
        ], 404);
    }

    public function update(DistrictRequest $request, $id)
    {
        $currentDistrict =  District::find($id);
        if ($currentDistrict) {
            $currentDistrict->province_id = $request['province_id'];
            $currentDistrict->districtName = $request["districtName"];
            $currentDistrict->save();
            return response()->json([
                'message' => 'District Update',
                'Districts' => [$currentDistrict]
            ], 200);
        }
        return response()->json([
            'message' => 'No District Found'
        ], 404);
    }

    public function destroy($id)
    {
        $currentDistrict =  District::find($id);
        if ($currentDistrict) {
            $currentDistrict->delete();
            return response()->json([
                'message' => 'District Deleted Successfully',
            ], 200);
        }
        return response()->json([
            'message' => 'No District Found'
        ], 404);
    }
}
