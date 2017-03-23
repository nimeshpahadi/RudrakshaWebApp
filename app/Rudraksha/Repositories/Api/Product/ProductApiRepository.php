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
     * ProductApiRepository constructor.
     * @param ProductInfo $productInfo
     * @param ProductImage $productImage
     * @param ProductDescription $productDescription
     * @param Category_benifit $category_benifit
     */
    public function __construct(ProductInfo $productInfo,
                                ProductImage $productImage,
                                ProductDescription $productDescription, Category_benifit $category_benifit)
    {
        $this->productInfo = $productInfo;
        $this->productImage = $productImage;
        $this->productDescription = $productDescription;
        $this->category_benifit = $category_benifit;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getProductImage($id)
    {
        return $this->productImage->select('name')
                    ->where('product_id', '=', $id)
                    ->first();
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
        return $this->productInfo->select('*')
                    ->where('id', $id)
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
                    ->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function categoryBenefit($id)
    {
        return $this->category_benifit->select('*')
                    ->where('category_id', $id)
                    ->get();
    }

}