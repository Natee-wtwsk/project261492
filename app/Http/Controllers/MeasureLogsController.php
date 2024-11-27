<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeasureLogsController extends Controller
{
    public function AddMeasureLogs(Request $request) {
        $ofEntity = $request->user('sanctum')->Entities;
        return $ofEntity;
    }
}
