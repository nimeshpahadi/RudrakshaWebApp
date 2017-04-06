<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 3/28/17
 * Time: 3:39 PM
 */

namespace App\Rudraksha\Services;


use App\Rudraksha\Repositories\ProductPriceRepository;

class ProductPriceService
{

    /**
     * @var ProductPriceRepository
     */
    private $productPriceRepository;

    public function __construct(ProductPriceRepository $productPriceRepository)
    {
        $this->productPriceRepository = $productPriceRepository;
    }

    public function store_productprice($request)
    {
        $data= $request->all();
        return $this->productPriceRepository->storeProductPrice($data);
    }

    public function getallproductPrice()
    {
        return $this->productPriceRepository->getAllProductPrice();
    }

    public function getallproductPricedetail()
    {
        return $this->productPriceRepository->getAllProductPricedetail();
    }

    public function getproductpriceId($id)
    {
        return $this->productPriceRepository->getProductPriceid($id);
    }

    public function updateproductprice($request, $id)
    {
        $formData= $request->all();
        return $this->productPriceRepository->updateProductPrice($formData,$id);
    }

    public function deleteprice($id)
    {
        return $this->productPriceRepository->deletePrice($id);
    }

}