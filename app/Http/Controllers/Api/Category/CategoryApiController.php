<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/21/17
 * Time: 12:36 PM
 */

namespace App\Http\Controllers\Api\Category;


use App\Http\Controllers\Controller;
use App\Rudraksha\Services\Api\Category\CategoryApiService;

class CategoryApiController extends Controller
{
    /**
     * @var CategoryApiService
     */
    private $categoryApiService;

    /**
     * CategoryApiController constructor.
     * @param CategoryApiService $categoryApiService
     */
    public function __construct(CategoryApiService $categoryApiService)
    {
        $this->categoryApiService = $categoryApiService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCategoryList()
    {
        $category = $this->categoryApiService->getCategory();
        return response()->json($category);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductByCategory($id)
    {
        $products = $this->categoryApiService->getProducts($id);
        return response()->json($products);
    }
}