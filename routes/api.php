<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MeasureLogsController;
use App\Http\Middleware\EnsureAPIJsonHeaders;

Route::get('/greeting', function () {
    return 'Hello World';
});

Route::get('/zone/{id}', function (int $id) {
    $zones = DB::table('zones')->get()->where('id', $id);
    return $zones;
});

Route::get('/zone', function () {
    $zones = DB::table('zones')->get();
    return $zones;
});

Route::get('/measure_list', function () {
    $zones = DB::table('measure_logs')->get();
    return $zones;
});

Route::post('/tokens/test', function (Request $request) {
    return $request->input('payload');
});

Route::middleware([EnsureAPIJsonHeaders::class])->group(function(){
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/AddMeasureLogs', [MeasureLogsController::class, 'AddMeasureLogs']);
});
