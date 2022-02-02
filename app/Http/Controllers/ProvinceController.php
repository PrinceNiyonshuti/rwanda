<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProvinceRequest;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::get(['provinceName']);
        return response()->json(
            $provinces,
            200
        );
    }

    public function store(Request $request)
    {
        $newProvince = new Province();
        $newProvince->provinceName = $request['provinceName'];
        $newProvince->save();
        return response()->json([
            'message' => 'Province Registered',
            'data' => ['Province' => $newProvince]
        ], 200);
    }

    public function show($id)
    {
        $currentProvince =  Province::find($id);
        if ($currentProvince) {
            return response()->json(
                $currentProvince,
                200
            );
        }
        return response()->json([
            'message' => 'No Province Found'
        ], 404);
    }


    public function update(Request $request, $id)
    {
        $currentProvince =  Province::find($id);
        if ($currentProvince) {
            $currentProvince->provinceName = $request["provinceName"];
            $currentProvince->save();
            return response()->json([
                'message' => 'Province Update',
                'Province' => [$currentProvince]
            ], 200);
        }
        return response()->json([
            'message' => 'No Province Found'
        ], 404);
    }

    public function destroy($id)
    {
        $currentProvince =  Province::find($id);
        if ($currentProvince) {
            $currentProvince->delete();
            return response()->json([
                'message' => 'Province Deleted Successfully',
            ], 200);
        }
        return response()->json([
            'message' => 'No Province Found'
        ], 404);
    }
}
