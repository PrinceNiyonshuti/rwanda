<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectorRequest;
use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    public function index()
    {
        $Sectors = Sector::get(['sectorName']);
        return response()->json(
            $Sectors,
            200
        );
    }

    public function store(SectorRequest $request)
    {
        $newSector = new Sector();
        $newSector->district_id = $request['district_id'];
        $newSector->sectorName = $request['sectorName'];
        $newSector->save();
        return response()->json([
            'message' => 'Sector Registered',
            'data' => ['Sector' => $newSector]
        ], 200);
    }

    public function show($id)
    {
        $currentSector = Sector::find($id);
        if ($currentSector) {
            return response()->json(
                $currentSector,
                200
            );
        }
        return response()->json([
            'message' => 'No Sector Found'
        ], 404);
    }

    public function update(SectorRequest $request, $id)
    {
        $currentSector =  Sector::find($id);
        if ($currentSector) {
            $currentSector->district_id = $request['district_id'];
            $currentSector->sectorName = $request["sectorName"];
            $currentSector->save();
            return response()->json([
                'message' => 'Sector Update',
                'Sector' => [$currentSector]
            ], 200);
        }
        return response()->json([
            'message' => 'No Sector Found'
        ], 404);
    }

    public function destroy($id)
    {
        $currentSector =  Sector::find($id);
        if ($currentSector) {
            $currentSector->delete();
            return response()->json([
                'message' => 'Sector Deleted Successfully',
            ], 200);
        }
        return response()->json([
            'message' => 'No Sector Found'
        ], 404);
    }
}
