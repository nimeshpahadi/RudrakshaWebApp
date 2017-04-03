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
    public function productList(Request $request)
    {
        $category=$request->get('cat', null);

        $products = $this->productApiService->getProductsList($category);

        return response()->json($products);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function productDetailList($id)
    {
        $productsList = $this->productApiService->getProductDetailList($id);

        return response()->json($productsList);
    }
}