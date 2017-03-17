<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/16/17
 * Time: 2:40 PM
 */

namespace App\Rudraksha\Services\Api\Product;


use App\Rudraksha\Entities\ProductImage;
use App\Rudraksha\Repositories\Api\Product\ProductApiRepository;
use App\Rudraksha\Repositories\CategoryRepository;

class ProductApiService
{
    /**
     * @var ProductApiRepository
     */
    private $productApiRepository;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;
    /**
     * @var ProductImage
     */
    private $productImage;

    /**
     * ProductApiService constructor.
     * @param ProductApiRepository $productApiRepository
     * @param CategoryRepository $categoryRepository
     * @param ProductImage $productImage
     */
    public function __construct(ProductApiRepository $productApiRepository,
                                CategoryRepository $categoryRepository,
                                ProductImage $productImage)
    {
        $this->productApiRepository = $productApiRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productImage = $productImage;
    }

    /**
     * @return array
     */
    public function getProducts()
    {
        $baseUrl=url("/");
        $categoryData = $this->categoryRepository->getCategory();
        $productDetail = [];
        foreach ($categoryData as $category) {
           $productDetail[$category->name]=[];
           $productDetail[$category->name]["cat"]=$category->name;
           $products  = $this->productApiRepository->getCategoryProduct($category->id);
            foreach ($products as $product) {
                $image = $this->productApiRepository->getProductImage($product['id']);
                $imageArr = json_decode($image->name);
                $productDetail[$category->name]["products"]=[
                    "id"=>$product['id'],
                    "name"=>$product['name'],
                    "price"=>$product["price"],
                    "discount"=>$product["discount"],
                    "image"=>$baseUrl."/admin/product/storage/product/".$imageArr[0]
                ];
            }
        }
        return $productDetail;
    }
}