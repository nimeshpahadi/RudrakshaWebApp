<?php

namespace App\Http\Controllers\Customer;


use App\Http\Requests\DeliveryAddressRequest;
use App\Rudraksha\Services\CustomerService;
use App\Rudraksha\Services\DeliveryAddressService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DeliveryAddressController extends Controller
{

    /**
     * @var DeliveryAddressService
     */
    private $deliveryAddressService;
    /**
     * @var CustomerService
     */
    private $customerService;

    public function __construct(DeliveryAddressService $deliveryAddressService,CustomerService $customerService)
    {
        $this->middleware('auth');
        $this->deliveryAddressService = $deliveryAddressService;
        $this->customerService = $customerService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $cusid=$this->customerService->getCustomerId($id);
        return view('customer.delivery.create',compact('cusid'));
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
    public function store(DeliveryAddressRequest $request)
    {
        if ($this->deliveryAddressService->store_delivery($request)) {
            return redirect()->route('customers.index')->withSuccess("Delivery Address added!");
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
        $customerDelivery= $this->deliveryAddressService->getdeliverybyId($id);
        return view('customer.delivery.edit',compact('customerDelivery'));
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
        if ($this->deliveryAddressService->update_delivery($request,$id)) {
            return redirect()->route('customers.index')->withSuccess("Delivery address updated !");
        }
        return back()->withErrors("Something went wrong");
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
