<?php

namespace App\Http\Controllers;

use App\Http\Requests\CellRequest;
use App\Models\Cell;
use Illuminate\Http\Request;

class CellController extends Controller
{
    public function index()
    {
        $Sectors = Cell::get(['cellName']);
        return response()->json(
            $Sectors,
            200
        );
    }

    public function store(CellRequest $request)
    {
        $newCell = new Cell();
        $newCell->sector_id = $request['sector_id'];
        $newCell->cellName = $request['cellName'];
        $newCell->save();
        return response()->json([
            'message' => 'Cell Registered',
            'data' => ['Cell' => $newCell]
        ], 200);
    }

    public function show($id)
    {
        $currentCell = Cell::find($id);
        if ($currentCell) {
            return response()->json(
                $currentCell,
                200
            );
        }
        return response()->json([
            'message' => 'No Cell Found'
        ], 404);
    }

    public function update(CellRequest $request, $id)
    {
        $currentCell =  Cell::find($id);
        if ($currentCell) {
            $currentCell->sector_id = $request['sector_id'];
            $currentCell->cellName = $request["cellName"];
            $currentCell->save();
            return response()->json([
                'message' => 'Cell Update',
                'Cell' => [$currentCell]
            ], 200);
        }
        return response()->json([
            'message' => 'No Cell Found'
        ], 404);
    }

    public function destroy($id)
    {
        $currentCell =  Cell::find($id);
        if ($currentCell) {
            $currentCell->delete();
            return response()->json([
                'message' => 'Cell Deleted Successfully',
            ], 200);
        }
        return response()->json([
            'message' => 'No Cell Found'
        ], 404);
    }
}
