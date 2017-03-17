<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/16/17
 * Time: 2:33 PM
 */

namespace App\Http\Controllers\Api\Product;


use App\Http\Controllers\Controller;
use App\Rudraksha\Services\Api\Product\ProductApiService;

class ProductApiController extends Controller
{
    /**
     * @var ProductApiService
     */
    private $productApiService;

    /**
     * ProductApiController constructor.
     * @param ProductApiService $productApiService
     */
    public function __construct(ProductApiService $productApiService)
    {
        $this->productApiService = $productApiService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductList()
    {
        $products = $this->productApiService->getProducts();
        return response()->json($products);
    }
}