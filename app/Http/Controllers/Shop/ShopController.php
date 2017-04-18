<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Rudraksha\Services\CappingService;
use App\Rudraksha\Services\CategoryService;
use App\Rudraksha\Services\CustomerAddressService;
use App\Rudraksha\Services\ProductPriceService;
use App\Rudraksha\Services\ProductService;
use App\Http\Controllers\Controller;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;


class ShopController extends Controller
{
    /**
     * @var ProductService
     */
    private $productService;
    /**
     * @var CustomerAddressService
     */
    private $customerAddressService;
    /**
     * @var ProductPriceService
     */
    private $productPriceService;
    /**
     * @var CappingService
     */
    private $cappingService;
    /**
     * @var CategoryService
     */
    private $categoryService;


    public function __construct(ProductService $productService,
                                CustomerAddressService $customerAddressService,
                                ProductPriceService $productPriceService,
                                CappingService $cappingService,CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->customerAddressService = $customerAddressService;
        $this->productPriceService = $productPriceService;
        $this->cappingService = $cappingService;
        $this->categoryService = $categoryService;
    }


    /**
     * Display a home page.
     *
     * @return array
     */

    public function index(Request $request) {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $category=$this->productService->getProductasCategory();
        $col = new Collection($category);
        $perPage = 2;
        $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $entries = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);
        if ($request->ajax()) {
            $view = view('shop.index',compact('entries'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('shop.home',compact('entries'));

    }



    public function detail($id)
    {
        $productid = $this->productService->get_product($id);
        $product_desc = $this->productService->get_product_desc($id);
        $product_image = $this->productService->get_product_image($id);
        $product_price= $this->productPriceService->getproductpriceId($id);
        $product_imagerank = $this->productService->get_product_image_rank($id);
        $capping=$this->cappingService->getallcap();
        $benefits=$this->categoryService->get_category_benefit($productid->category_id);
        return view('shop.detail',compact('productid','product_desc',
            'product_image','product_imagerank','product_price','capping','benefits'));
    }
    public function aboutUs()
    {
        return view('shop.about_us');
    }

    public function contact()
    {
        return view('shop.contact');
    }

    public function faq()
    {
        return view('shop.faq');
    }
}
