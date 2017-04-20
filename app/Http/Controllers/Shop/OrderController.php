<?php

namespace App\Http\Controllers\Shop;

use App\Rudraksha\Services\CappingService;
use App\Rudraksha\Services\CategoryService;
use App\Rudraksha\Services\OrderService;
use App\Rudraksha\Services\ProductPriceService;
use App\Rudraksha\Services\ProductService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    /**
     * @var OrderService
     */
    private $orderService;
    /**
     * @var ProductService
     */
    private $productService;
    /**
     * @var CategoryService
     */
    private $categoryService;
    /**
     * @var ProductPriceService
     */
    private $productPriceService;
    /**
     * @var CappingService
     */
    private $cappingService;

    public function __construct(OrderService $orderService,
                                ProductService $productService, CategoryService $categoryService,
                                ProductPriceService $productPriceService,CappingService $cappingService)
    {
        $this->middleware('auth');
        $this->orderService = $orderService;
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->productPriceService = $productPriceService;
        $this->cappingService = $cappingService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//return view('shop.contact');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if ($this->orderService->order_itemStore($data)) {
            return redirect('/cart')->withSuccess("Order is added to cart!");
        }
        return back()->withErrors("oops Something went wrong");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($oid)
    {
        $orderid=$this->orderService->getorderbyId($oid);
        $productid = $this->productService->get_product($orderid->product_id);
        $product_desc = $this->productService->get_product_desc($orderid->product_id);
        $product_image = $this->productService->get_product_image($orderid->product_id);
        $product_price= $this->productPriceService->getproductpriceId($orderid->product_id);
        $product_imagerank = $this->productService->get_product_image_rank($orderid->product_id);
        $capping=$this->cappingService->getallcap();
        $benefits=$this->categoryService->get_category_benefit($productid->category_id);
        return view('shop.order.edit',compact('productid','product_desc',
            'product_image','product_imagerank','product_price','capping','benefits','orderid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$request->all();
        if ($this->orderService->orderitemupdate($data, $id)) {
            return redirect()->route('cart', compact('id'))->withSuccess('Cart Item Updated');
        }
        return back()->withErrors('something went wrong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       if ($this->orderService->deletecartitem($id)) {
            return back()->withSuccess('Cart item Deleted');
        }
        return back()->withErrors('something went wrong');
    }
    public function cart()
    {

        $orderitem=$this->orderService->getorderbyCustomerid(Auth::user()->id);
//        dd($orderitem);
        return view('shop.order.cart',compact('orderitem','cap'));
    }

    public  function  clearall($id)
    {
        if ($this->orderService->deleteallcartitem($id)) {
            return redirect('/')->withSuccess('Cart item  all cleared');
        }
        return back()->withErrors('something went wrong');
    }
}
