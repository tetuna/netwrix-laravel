<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\State;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json([
            'data' => State::all()
        ]);
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return JsonResponse
     */
    public function searchByCountry(Request $request)
    {
        return response()->json([
            'data' => State::where('country_id', $request->get('country'))->get()
        ]);

    }
}
