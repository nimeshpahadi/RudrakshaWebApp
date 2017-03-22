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
use Illuminate\Http\Request;

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
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductList(Request $request)
    {
        $category=$request->get('cat', null);

        $products = $this->productApiService->getProducts($category);

        return response()->json($products);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductDetailList($id)
    {
        $productsList = $this->productApiService->getAllProductDetails($id);

        return response()->json($productsList);
    }
}