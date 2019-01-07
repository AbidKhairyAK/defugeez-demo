<?php

namespace App\Http\Controllers;

use App\Model\District;
use App\Model\Province;
use App\Model\Regency;
use App\Model\Village;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class LocationController extends Controller
{
	/**
     * Get all province
     *
     * @return string JSON
     */
    public function province(): JsonResponse
    {
    	$provincies = Province::orderBy('name', 'ASC')->get();
        return response()->json($provincies);
    }

    /**
     * Get cities based on selected province
     *
     * @return string JSON
     */
    public function regency(): JsonResponse
    {
        $regencies = Regency::whereProvinceId(request('province'))
            ->orderBy('name', 'ASC')
            ->get();
        return response()->json($regencies);
    }

    public function district(): JsonResponse
    {
        $districts = District::whereRegencyId(request('regency'))
            ->orderBy('name', 'ASC')
            ->get();
        return response()->json($districts);
    }

    public function village(): JsonResponse
    {
        $villages = Village::whereDistrictId(request('district'))
            ->orderBy('name', 'ASC')
            ->get();
        return response()->json($villages);
    }
}
