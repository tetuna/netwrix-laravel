<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Partner;
use App\Models\Country;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json([
            'partners' => Partner::get(),
            'countries' => Country::get()
        ]);
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return JsonResponse
     */
    public function search(Request $request)
    {
        return response()->json([
            'partners' => Partner::
            when(
                $request->get('search_company'),
                function ($query, $search_company) {
                    return $query->where(function ($query) use ($search_company) {
                        return $query->where('company', 'like', '%' . $search_company . '%')
                            ->orWhere('address', 'like', '%' . $search_company . '%');
                    });
                }
            )
                ->when(
                    $request->get('type'),
                    function ($query, $type) {
                        return $query->where('status', $type);
                    }
                )
                ->when(
                    $request->get('country'),
                    function ($query, $country) {
                        return $query->where('countries_covered', 'like', '%"' . $country . '"%');
                    }
                )
                ->when(
                    $request->get('state'),
                    function ($query, $state) {
                        return $query->where('states_covered', 'like', '%"' . $state . '"%');
                    }
                )->get()
        ]);
    }
}
