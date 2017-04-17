<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CappingRequest;
use App\Rudraksha\Services\CappingService;
use Illuminate\Http\Request;

class CappingAdminController extends Controller
{
    /**
     * @var CappingService
     */
    private $cappingService;

    public function __construct(CappingService $cappingService)
    {
        $this->middleware('auth:admin');
        $this->cappingService = $cappingService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cap= $this->cappingService->getallcap();
        return view('admin.capping.index',compact('cap'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.capping.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CappingRequest $request)
    {
        if ($this->cappingService->store_capping($request)) {
            return redirect()->route('capping.index')->withSuccess("Capping added!");
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
        $capping =$this->cappingService->getcap($id);
        return view('admin.capping.edit',compact('capping'));
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
        if ($this->cappingService->edit_capping($request,$id)) {
            return redirect()->route('capping.index')->withSuccess("Capping edited!");
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
        if ($this->cappingService->delete_capping($id)) {
            return back()->withSuccess("Capping deleted!");
        }
        return back()->withErrors("Something went wrong");
    }


    public function updateImage(CappingRequest $request,$id)
    {
        if ($this->cappingService->edit_capImage($request, $id)) {

            return back()->withSuccess("Capping image edited!");
        }
        return back()->withErrors('something went wrong');
    }
}
