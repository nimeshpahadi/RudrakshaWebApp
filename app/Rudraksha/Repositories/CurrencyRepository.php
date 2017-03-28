<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 3/28/17
 * Time: 1:51 PM
 */

namespace App\Rudraksha\Repositories;


use App\Rudraksha\Entities\Currency;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Database\QueryException;

class CurrencyRepository
{

    /**
     * @var Currency
     */
    private $currency;
    /**
     * @var Log
     */
    private $log;

    /**
     * CurrencyRepository constructor.
     * @param Currency $currency
     * @param Log $log
     */
    public function __construct(Currency $currency, Log $log)
    {
        $this->currency = $currency;
        $this->log = $log;
    }

    public function storeCurrency($request)
    {
        try {
            $this->currency->create($request->all());
            $this->log->info("currency Created");
            return true;
        } catch (QueryException $e) {
            $this->log->error("currency Creation Failed %s", [$e->getMessage()]);
            return false;
        }
    }

    public function getallCurrency()
    {
        return $this->currency->select('*')->get();
    }

    public function getcurrencyid($id)
    {
        return $this->currency->select('*')->where('id',$id)->first();
    }

    public function updateCurrency($formData, $id)
    {

        try {
            $data= Currency::find($id);
            $data->currency= $formData['currency'];
            $data->code= $formData['code'];
            $data->representation= $formData['representation'];
            $data->update();
            $this->log->info("Currency Updated", ['id' => $id]);

            return true;
        } catch (QueryException $e) {
            $this->log->error("Currency Update Failed %s", ['id' => $id], [$e->getMessage()]);
            return false;
        }
    }

    public function deleteCurrency($id)
    {
        try {
            $query = $this->currency->find($id);
            $query->delete();
            $query;
            $this->log->info("Currency  Deleted",['id'=>$id]);
            return true;
        } catch (QueryException $e) {
            $this->log->error("Currency Deletion Failed",['id' => $id], [$e->getMessage()]);
            return false;
        }
    }

}