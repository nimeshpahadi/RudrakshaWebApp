<?php

namespace App\Http\Controllers\Customer;

use App\Http\Requests\CustomerRequest;
use App\Rudraksha\Services\CustomerAddressService;
use App\Rudraksha\Services\CustomerService;
use App\Rudraksha\Services\DeliveryAddressService;
use App\Rudraksha\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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
    private $deliveryAddressService;
    /**
     * @var OrderService
     */
    private $orderService;

    /**
     * CustomerController constructor.
     * @param CustomerService $customerService
     * @param CustomerAddressService $customerAddressService
     * @param DeliveryAddressService $deliveryAddressService
     */
    public function __construct(CustomerService $customerService, CustomerAddressService $customerAddressService,
                                DeliveryAddressService $deliveryAddressService,OrderService $orderService)
    {
        $this->middleware('auth');
        $this->customerService = $customerService;
        $this->customerAddressService = $customerAddressService;
        $this->deliveryAddressService = $deliveryAddressService;
        $this->orderService = $orderService;
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
        $customerDelivery= $this->deliveryAddressService->getdelivery($userid);

        return view('customer.index',compact('customer', 'customerAddress','customerDelivery'));

    }



    public function updateimage(Request $request,$id)
    {
        if ($this->customerService->updateImage($request, $id))
        {
            return back()->withSuccess("Imageuploaded!");
        }
        return back()->withErrors('something went wrong');
    }


    public function history($id)
    {
        $history=$this->orderService->getordergroupbycustomerid($id);
        return view('customer.order.history',compact('history'));
    }

    public function view($id)
    {
        $data=$this->orderService->getordergroupbyGroupid($id);
        return view('customer.order.view',compact('data'));
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


    public function changepassword(CustomerRequest $request, $id)
    {

        if ($this->customerService->changePassword($request, $id)) {
            return redirect()->route('profile.index',$id)->withSuccess('password Changed');
        }
        return back()->withErrors('old password may be wrong');
    }
}
