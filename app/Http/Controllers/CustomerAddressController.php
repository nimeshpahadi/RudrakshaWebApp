<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Rudraksha\Services\CustomerAddressService;
use App\Rudraksha\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerAddressController extends Controller
{
    /**
     * @var CustomerAddressService
     */
    private $customerAddressService;
    /**
     * @var CustomerService
     */
    private $customerService;


    /**
     * CustomerAddressController constructor.
     * @param CustomerAddressService $customerAddressService
     * @param CustomerService $customerService
     */
    public function __construct(CustomerAddressService $customerAddressService, CustomerService $customerService)
    {
        $this->middleware('auth');
        $this->customerAddressService = $customerAddressService;
        $this->customerService = $customerService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = $this->customerService->getCustomerId($id);
        return view('customer/address/create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AddressRequest $addressRequest
     * @return \Illuminate\Http\Response
     */
    public function store(AddressRequest $addressRequest)
    {
        $data = $addressRequest->all();

        if ($this->customerAddressService->serviceAddressStore($data)) {

            return redirect('/customers')->withSuccess("Customer Address Created!");
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
    public function edit($id)
    {
        $userId = $this->customerAddressService->getCustomerAddressCid($id);
        return view('customer/address/edit', compact('userId'));
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
        if ($this->customerAddressService->serviceAddressUpdate($request, $id)) {

            return redirect()->route('customers.index', compact('id'))->withSuccess('Customer Address Updated');
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
