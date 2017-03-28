<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 3/28/17
 * Time: 1:50 PM
 */

namespace App\Rudraksha\Services;


use App\Rudraksha\Repositories\CurrencyRepository;

class CurrencyService
{

    /**
     * @var CurrencyRepository
     */
    private $currencyRepository;

    public function __construct(CurrencyRepository $currencyRepository)
    {

        $this->currencyRepository = $currencyRepository;
    }

    public function store_currency($request)
    {
        return $this->currencyRepository->storeCurrency($request);
    }

    public function getCurrency()
    {
        return $this->currencyRepository->getallCurrency();
    }

    public function getCurrencyId($id)
    {
        return $this->currencyRepository->getcurrencyid($id);
    }

    public function updatecurrency($request, $id)
    {
        $formData=$request->all();
        return $this->currencyRepository->updateCurrency($formData,$id);
    }

    public function deletecurrency($id)
    {
        return $this->currencyRepository->deleteCurrency($id);
    }
}