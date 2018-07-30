<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Http\JsonResponse;

class StatusController extends Controller
{
    /*
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() : JsonResponse
    {
        return response()->json([
            'created_by' => 'http://localhost::8080',
            'datetime' => Carbon::now()->toDateTimeString(),
        ]);
    }
}
