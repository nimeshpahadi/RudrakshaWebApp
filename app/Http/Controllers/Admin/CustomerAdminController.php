<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rudraksha\Services\CustomerAddressService;
use App\Rudraksha\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerAdminController extends Controller
{
    /**
     * @var CustomerService
     */
    private $customerService;
    /**
     * @var CustomerAddressService
     */
    private $customerAddressService;

    public function __construct(CustomerService $customerService,CustomerAddressService $customerAddressService)
    {
        $this->middleware('auth:admin');
        $this->customerService = $customerService;
        $this->customerAddressService = $customerAddressService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer=$this->customerService->getCustomer();
        return view('admin.customer.index',compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
       $address= $this->customerAddressService->getCustomerAddress($id);
        $customerid=$this->customerService->getCustomerId($id);
        return view('admin.customer.show',compact('customerid','address'));


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
