<?php

namespace App\Http\Controllers\Admin;

use App\Rudraksha\Services\CappingService;
use App\Rudraksha\Services\CategoryService;
use App\Rudraksha\Services\OrderService;
use App\Rudraksha\Services\ProductPriceService;
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
    private $productService;
    private $categoryService;
    /**
     * @var ProductPriceService
     */
    private $productPriceService;
    /**
     * @var CappingService
     */
    private $cappingService;

    public function __construct(ProductService $productService,CappingService $cappingService,ProductPriceService $productPriceService, CategoryService $categoryService, OrderService $orderService)
    {
        $this->middleware('auth:admin');
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->orderService = $orderService;
        $this->productPriceService = $productPriceService;
        $this->cappingService = $cappingService;
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
    public function edit($id)
    {
        $orderid=$this->orderService->getorderbyId($id);
        $productid = $this->productService->get_product($orderid->product_id);
        $product_desc = $this->productService->get_product_desc($orderid->product_id);
        $product_image = $this->productService->get_product_image($orderid->product_id);
        $product_price= $this->productPriceService->getproductpriceId($orderid->product_id);
        $product_imagerank = $this->productService->get_product_image_rank($orderid->product_id);
        $capping=$this->cappingService->getallcap();
        $benefits=$this->categoryService->get_category_benefit($productid->category_id);
        return view('admin.order.edit',compact('productid','product_desc',
            'product_image','product_imagerank','product_price','capping','benefits','orderid'));

    }
    public function update(Request $request, $id)
    {
        $data=$request->all();

        if ($this->orderService->orderitemupdate($data, $id)) {
            return redirect()->route('order.list')->withSuccess('Cart Item Updated');
        }
        return back()->withErrors('something went wrong');
    }

     public function statusupdate( Request $request,$id)
     {
         $data=$request->all();

         if ($this->orderService->ordergroupstatusUpdate($data, $id)) {
             return redirect()->route('order.list')->withSuccess('Order Group status Updated');
         }
         return back()->withErrors('something went wrong');
     }
}
