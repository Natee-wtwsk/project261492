<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeasureLogsController extends Controller
{
    public function AddMeasureLogs(Request $request) {
        $ofUser = $request->user('sanctum');
        if (!$ofUser) {
            return response()->json([
                'status' => 'Token Does not exist.'
            ], 404);
        }
        $ofEntity = $ofUser->Entities;
        if (!$ofEntity) {
            return response()->json([
                'status' => 'Entity Does not exist.'
            ], 404);
        }

        $anchorArray = [];
        $ControllerHaveAnchors = $ofEntity->ControllerHaveAnchors;
        foreach($ControllerHaveAnchors as $CHA)
        {
            $anchorArray[] = $CHA['have_anchor'];
        }
        return response()->json([
            'id' => $ofEntity->id,
            'type' => $ofEntity->EntityTypes->type,
            'description' => $ofEntity->description,
            'ControllerHaveAnchors' => $anchorArray
        ], 200);
    }
}
