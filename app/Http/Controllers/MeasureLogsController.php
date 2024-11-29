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
            $anchorArray = [];
            foreach ($ofEntity->ControllerHaveAnchors as $CHA) {
                $anchorArray[] = $CHA['have_anchor'];
            }
            
            foreach ($request->data as $d) {
                if (in_array($d['anchor'], $anchorArray)) {
                    if ($d['timestamp'] == '') {
                        $d['timestamp'] = now();
                    }
                    MeasureLogs::insert($d);
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
