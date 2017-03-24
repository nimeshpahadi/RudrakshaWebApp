<?php

namespace App\Http\Controllers;

use App\Rudraksha\Services\CustomerAddressService;
use App\Rudraksha\Services\CustomerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * @var CustomerService
     */
    private $customerService;
    /**
     * @var CustomerAddressService
     */
    private $customerAddressService;

    /**
     * CustomerController constructor.
     * @param CustomerService $customerService
     * @param CustomerAddressService $customerAddressService
     */
    public function __construct(CustomerService $customerService, CustomerAddressService $customerAddressService)
    {
        $this->middleware('auth');
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
        $userid=Auth::user()->id ;

        $customer= $this->customerService->getCustomerId($userid);

        $customerAddress = $this->customerAddressService->getCustomerAddress($userid);

        return view('customer.index',compact('customer', 'customerAddress'));
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


    public function updateimage(Request $request,$id)
    {
        if ($this->customerService->updateImage($request, $id))
        {
            return back()->withSuccess("Imageuploaded!");
        }
        return back()->withErrors('something went wrong');
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
    /**
     * form for password display
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function password($id)
    {
        $user = $this->customerService->getCustomerId($id);
        return view('customer.password',compact('user'));
    }

    /**
     * update password
     * @param Request $request
     * @param $id
     * @return $this
     */
    public function changepassword(Request $request, $id)
    {
        if ($this->customerService->changePassword($request, $id)) {
            return redirect()->route('customers.index',$id)->withSuccess('password Changed');
        }
        return back()->withErrors('old password may be wrong');
    }
}
