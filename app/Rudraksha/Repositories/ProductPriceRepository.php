<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 3/28/17
 * Time: 3:40 PM
 */

namespace App\Rudraksha\Repositories;


use App\Rudraksha\Entities\ProductPrice;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Database\QueryException;

class ProductPriceRepository
{

    /**
     * @var ProductPrice
     */
     /**
     * @var Log
     */
    private $log;
    /**
     * @var ProductPrice
     */
    private $productPrice;

    /**
     * ProductPriceRepository constructor.
     * @param ProductPrice $productPrice
     * @param Log $log
     */
    public function __construct(ProductPrice $productPrice,Log $log)
    {
        $this->log = $log;
        $this->productPrice = $productPrice;
    }

    public function storeProductPrice($data)
    {
        try {
            $data = $this->productPrice->create($data);
            $this->log->info("Product Price Created");
            return $data;
        } catch (QueryException $e) {
            $this->log->error("Product Price Creation Failed %s",[$e->getMessage()]);
            return false;
        }
    }

    public function getAllProductPrice()
    {
        return $this->productPrice->select('*')->get();
    }

    public function getAllProductPricedetail()
    {
       $query=$this->productPrice->select('product_infos.name as pname', 'currencies.currency as currency',
           'product_prices.*')
            ->join('product_infos','product_infos.id','product_id')
            ->join('currencies','currencies.id','currency_id')
            ->get();
       return $query;
    }

    public function getProductPriceid($id)
    {
        $query=$this->productPrice->select('product_infos.name as pname', 'currencies.currency as currency',
            'product_prices.*')
            ->join('product_infos','product_infos.id','product_id')
            ->join('currencies','currencies.id','currency_id')
            ->where('product_prices.id',$id)
            ->first();
        return $query;
    }

    public function updateProductPrice($formData, $id)
    {
        try {
            $data=ProductPrice::find($id);
            $data->product_id= $formData['product_id'];
            $data->currency_id= $formData['currency_id'];
            $data->price= $formData['price'];
            $data->update();
            $this->log->info("Product Price updated");
            return $data;
        } catch (QueryException $e) {
            $this->log->error("Product Price update Failed %s",[$e->getMessage()]);
            return false;
        }

    }

    public function getProductPricebyProductId($id)
    {
        $query=$this->productPrice->select('product_prices.*','currencies.*')
            ->join('product_infos','product_infos.id','product_prices.product_id')
            ->join('currencies','currencies.id','currency_id')
            ->where('product_infos.id',$id)
            ->get();
        return $query;
    }

}