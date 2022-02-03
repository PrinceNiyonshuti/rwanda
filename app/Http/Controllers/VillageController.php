<?php

namespace App\Http\Controllers;

use App\Models\Village;
use Illuminate\Http\Request;

class VillageController extends Controller
{
    public function index()
    {
        $Sectors = Village::get(['villageName']);
        return response()->json(
            $Sectors,
            200
        );
    }

    public function store(Request $request)
    {
        $newVillage = new Village();
        $newVillage->cell_id = $request['cell_id'];
        $newVillage->villageName = $request['villageName'];
        $newVillage->save();
        return response()->json([
            'message' => 'Village Registered',
            'data' => ['Village' => $newVillage]
        ], 200);
    }

    public function show($id)
    {
        $currentVillage = Village::find($id);
        if ($currentVillage) {
            return response()->json(
                $currentVillage,
                200
            );
        }
        return response()->json([
            'message' => 'No Village Found'
        ], 404);
    }

    public function update(Request $request, $id)
    {
        $currentVillage =  Village::find($id);
        if ($currentVillage) {
            $currentVillage->cell_id = $request['cell_id'];
            $currentVillage->villageName = $request["villageName"];
            $currentVillage->save();
            return response()->json([
                'message' => 'Village Update',
                'Village' => [$currentVillage]
            ], 200);
        }
        return response()->json([
            'message' => 'No Village Found'
        ], 404);
    }

    public function destroy($id)
    {
        $currentVillage =  Village::find($id);
        if ($currentVillage) {
            $currentVillage->delete();
            return response()->json([
                'message' => 'Village Deleted Successfully',
            ], 200);
        }
        return response()->json([
            'message' => 'No Village Found'
        ], 404);
    }
}
