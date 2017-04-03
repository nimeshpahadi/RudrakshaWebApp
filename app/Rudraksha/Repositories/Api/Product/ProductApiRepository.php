<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/16/17
 * Time: 2:55 PM
 */

namespace App\Rudraksha\Repositories\Api\Product;


use App\Rudraksha\Entities\Category_benifit;
use App\Rudraksha\Entities\ProductDescription;
use App\Rudraksha\Entities\ProductImage;
use App\Rudraksha\Entities\ProductInfo;
use App\Rudraksha\Entities\ProductPrice;

class ProductApiRepository
{
    /**
     * @var ProductInfo
     */
    private $productInfo;
    /**
     * @var ProductImage
     */
    private $productImage;
    /**
     * @var ProductDescription
     */
    private $productDescription;
    /**
     * @var Category_benifit
     */
    private $category_benifit;
    /**
     * @var ProductPrice
     */
    private $productPrice;

    /**
     * ProductApiRepository constructor.
     * @param ProductInfo $productInfo
     * @param ProductImage $productImage
     * @param ProductDescription $productDescription
     * @param Category_benifit $category_benifit
     * @param ProductPrice $productPrice
     */
    public function __construct(ProductInfo $productInfo,
                                ProductImage $productImage,
                                ProductDescription $productDescription,
                                Category_benifit $category_benifit, ProductPrice $productPrice)
    {
        $this->productInfo = $productInfo;
        $this->productImage = $productImage;
        $this->productDescription = $productDescription;
        $this->category_benifit = $category_benifit;
        $this->productPrice = $productPrice;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getProductImage($id)
    {
        return $this->productImage->select('image')
                    ->where('product_id', '=', $id)
                    ->orderBy('rank')
                    ->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getProductPrice($id)
    {
        return $this->productPrice->select('product_prices.price', 'currencies.*')
                    ->join('currencies', 'currencies.id', 'product_prices.currency_id')
                    ->where('product_id', $id)
                    ->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getCategoryProduct($id)
    {
        $query = $this->productInfo->select('product_infos.*')
            ->join('categories', 'categories.id', 'product_infos.category_id')
            ->where('product_infos.category_id', $id)
            ->orderBy('product_infos.rank')
            ->get();

        return $query;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getProductInfo($id)
    {
        return $this->productInfo->select('product_infos.*', 'categories.mantra')
                                ->join('categories', 'categories.id', 'product_infos.category_id')
                                ->where('product_infos.id', $id)
                                ->first();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getProductDescription($id)
    {
        return $this->productDescription->select('*')
                    ->where('product_id', $id)
                    ->first();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getAllProductImage($id)
    {
        return $this->productImage->select('*')
                    ->where('product_id', $id)
                    ->first();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getCategoryBenefit($id)
    {
        return $this->category_benifit->select('*')
                    ->where('category_id', $id)
                    ->get();
    }
}