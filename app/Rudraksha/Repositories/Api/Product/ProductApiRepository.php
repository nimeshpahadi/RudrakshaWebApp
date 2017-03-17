<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/16/17
 * Time: 2:55 PM
 */

namespace App\Rudraksha\Repositories\Api\Product;


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
     * ProductApiRepository constructor.
     * @param ProductInfo $productInfo
     * @param ProductImage $productImage
     */
    public function __construct(ProductInfo $productInfo, ProductImage $productImage)
    {
        $this->productInfo = $productInfo;
        $this->productImage = $productImage;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getProductImage($id)
    {
        return $this->productImage->select('name')
                    ->where('product_id', '=', $id)
                    ->get()->first();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getCategoryProduct($id)
    {
        $query = $this->productInfo->select('product_infos.id', 'product_infos.name', 'product_infos.price'
                                                ,'product_infos.discount')
            ->join('categories', 'categories.id', 'product_infos.category_id')
            ->join('product_images', 'product_images.product_id', 'product_infos.id')
            ->where('product_infos.category_id', $id)
            ->orderBy('product_infos.rank')
            ->get()->toArray();

        return $query;
    }
}