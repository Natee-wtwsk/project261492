<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MeasureLogs;

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

        if ($ofEntity->EntityTypes['type'] == 'controller') {
            $ControllerHaveAnchors = [];
            foreach ($ofEntity->ControllerHaveAnchors as $CHA) {
                $ControllerHaveAnchors[] = $CHA['have_anchor'];
            }
            
            foreach ($request->data as $data) {
                if (in_array($data['anchor'], $ControllerHaveAnchors)) {
                    if ($data['timestamp'] == '') {
                        $data['timestamp'] = now();
                    }
                    MeasureLogs::insert($data);
                }
            }

            return response()->json([
                'Status' => 'ok',
            ], 200);
        }
        elseif ($ofEntity->EntityTypes['type'] == 'anchor') {
            $data = $request->data;
            if ($data['timestamp'] == '') {
                $data['timestamp'] = now();
            }
            $data['anchor'] = $ofEntity['id'];
            MeasureLogs::insert($data);
            return response()->json([
                'Status' => 'ok',
            ], 200);
        }

        return response()->json([
            'status' => 'Unauthorized.'
        ], 401);
    }

    public function GetMeasureLogs() {
        $log = MeasureLogs::get();
        return response()->json([
            'Status' => 'ok',
            'data' => $log,
        ], 200);
    }
}
