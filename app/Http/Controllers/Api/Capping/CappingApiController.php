<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/23/17
 * Time: 2:12 PM
 */

namespace App\Http\Controllers\Api\Capping;


use App\Http\Controllers\Controller;
use App\Rudraksha\Services\Api\Capping\CappingApiService;

class CappingApiController extends Controller
{
    /**
     * @var CappingApiService
     */
    private $cappingApiService;

    /**
     * CappingApiController constructor.
     * @param CappingApiService $cappingApiService
     */
    public function __construct(CappingApiService $cappingApiService)
    {
        $this->cappingApiService = $cappingApiService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCappingData()
    {
        $capping = $this->cappingApiService->serviceCappingData();

        return response()->json($capping);
    }
}