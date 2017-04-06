<?php

namespace App\Http\Controllers\Shop;

use App\Rudraksha\Services\CustomerAddressService;
use App\Rudraksha\Services\ProductService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


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

    public function __construct(ProductService $productService,CustomerAddressService $customerAddressService)
    {
        $this->productService = $productService;
        $this->customerAddressService = $customerAddressService;
    }

    /**
     * Display a home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=$this->productService->getProductasCategory();
//        $category=$this->productService->getProductasCategory()->paginate(2);

        return view('shop.home',compact('category'));
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
        //
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
        //
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
        //
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
