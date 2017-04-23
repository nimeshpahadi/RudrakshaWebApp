<?php

namespace App\Http\Controllers\Admin;

use App\Rudraksha\Services\CategoryService;
use App\Rudraksha\Services\OrderService;
use App\Rudraksha\Services\ProductService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderAdminController extends Controller
{
    //

    /**
     * @var OrderService
     */
    private $orderService;

    public function __construct(ProductService $productService, CategoryService $categoryService, OrderService $orderService)
    {
        $this->middleware('auth:admin');
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->orderService = $orderService;
    }
    public function index()
    {

        $data=$this->orderService->getordergroupall();
        return view('admin.order.list',compact('data'));
    }
    public  function detail($id)
    {
        $data=$this->orderService->getordergroupbyGroupid($id);
        return view('admin.order.show',compact('data'));

    }
}
