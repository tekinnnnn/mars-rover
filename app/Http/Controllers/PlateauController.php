<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePlateau;
use App\Models\Plateau;
use Illuminate\Http\JsonResponse;

class PlateauController extends Controller
{
    public function store(CreatePlateau $request): JsonResponse
    {
        $plateau = new Plateau([
                                   'x' => $request['x'],
                                   'y' => $request['y'],
                               ]);

        $plateau->save();

        return response()->json(['id' => $plateau->id]);
    }

    public function all()
    {
        $result = Plateau::all(['id', 'x', 'y']);

        if (!$result) {
            return response('', 404);
        }

        return response()->json($result);
    }

    public function show(?int $plateauId)
    {
        $result = Plateau::find($plateauId, ['id', 'x', 'y']);

        if (!$result) {
            return response('', 404);
        }

        return response()->json($result);
    }
}
