<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CurrencyRequest;
use App\Rudraksha\Services\CurrencyService;
use Illuminate\Http\Request;

class CurrencyAdminController extends Controller
{

    /**
     * @var CurrencyService
     */
    private $currencyService;

    public function __construct(CurrencyService $currencyService)
   {
       $this->middleware('auth:admin');
       $this->currencyService = $currencyService;
   }

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currency= $this->currencyService->getCurrency();
        return view('admin.currency.index',compact('currency'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.currency.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CurrencyRequest $request)
    {
        if ($this->currencyService->store_currency($request)) {
            return redirect()->route('currency.index')->withSuccess("currency added!");
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
        $currencyid= $this->currencyService->getCurrencyId($id);
        return view('admin.currency.edit',compact('currencyid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CurrencyRequest $request, $id)
    {
        if ($this->currencyService->updatecurrency($request, $id)) {

            return redirect()->route('currency.index')->withSuccess("currency updated!");
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
        if ($this->currencyService->deletecurrency($id)) {
            return back()->withSuccess('Currency Deleted');
        }
        return back()->withErrors('something went wrong');
    }
}
