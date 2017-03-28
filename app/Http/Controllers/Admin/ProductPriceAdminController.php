<?php

namespace App\Http\Controllers\Admin;

use App\Rudraksha\Services\CurrencyService;
use App\Rudraksha\Services\ProductPriceService;
use App\Rudraksha\Services\ProductService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductPriceAdminController extends Controller
{


    /**
     * @var ProductPriceService
     */
    private $productPriceService;
    /**
     * @var ProductService
     */
    private $productService;
    /**
     * @var CurrencyService
     */
    private $currencyService;

    /**
     * ProductPriceAdminController constructor.
     * @param ProductPriceService $productPriceService
     */
    public function __construct(ProductPriceService $productPriceService,ProductService $productService,CurrencyService $currencyService)
    {
        $this->middleware('auth:admin');
        $this->productPriceService = $productPriceService;
        $this->productService = $productService;
        $this->currencyService = $currencyService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=$this->productService->getactiveproduct();
        $currency= $this->currencyService->getCurrency();
        $productPrice= $this->productPriceService->getallproductPricedetail();

        return view('admin.product_price.index',compact('currency','product','productPrice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currency=$this->currencyService->getCurrency();
        $product=$this->productService->getactiveproduct();
        return view('admin.product_price.create',compact('product','currency'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($this->productPriceService->store_productprice($request)) {
            return redirect()->route('product_price.index')->withSuccess("Product Price added!");
        }
        return back()->withErrors("Something went wrong");

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
    public function edit($id)
    {
        $currency=$this->currencyService->getCurrency();
        $product=$this->productService->getactiveproduct();
        $prod_price= $this->productPriceService->getproductpriceId($id);
       return view('admin.product_price.edit',compact('prod_price','product','currency'));
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
        if ($this->productPriceService->updateproductprice($request, $id)) {

            return redirect()->route('product_price.index')->withSuccess("Product price updated!");
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
        //
    }
}
