<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/16/17
 * Time: 2:40 PM
 */

namespace App\Rudraksha\Services\Api\Product;


use App\Rudraksha\Entities\ProductImage;
use App\Rudraksha\Repositories\Api\Category\CategoryApiRepository;
use App\Rudraksha\Repositories\Api\Product\ProductApiRepository;

class ProductApiService
{
    /**
     * @var ProductApiRepository
     */
    private $productApiRepository;
    /**
     * @var CategoryApiRepository
     */
    private $categoryApiRepository;
    /**
     * @var ProductImage
     */
    private $productImage;

    /**
     * ProductApiService constructor.
     * @param ProductApiRepository $productApiRepository
     * @param CategoryApiRepository $categoryApiRepository
     * @param ProductImage $productImage
     */
    public function __construct(ProductApiRepository $productApiRepository,
                                CategoryApiRepository $categoryApiRepository,
                                ProductImage $productImage)
    {
        $this->productApiRepository = $productApiRepository;
        $this->categoryApiRepository = $categoryApiRepository;
        $this->productImage = $productImage;
    }

    /**
     * @param $name
     * @return array
     */
    public function getProducts($name)
    {
        $baseUrl = url('/');

        $categoryData = $this->categoryApiRepository->getCategoryId($name);

        $productDetail = [];

        $i = 0;

        foreach ($categoryData as $category) {

           $productDetail[$i]['category']=$category->name;

           $products = $this->productApiRepository->getCategoryProduct($category->id);

            foreach ($products as $product) {

                $image = $this->productApiRepository->getProductImage($product->id);

                $imageArr = json_decode($image->name);

                $productDetail[$i]['products'][]=[
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'discount' => $product->discount,
                    'image' => $baseUrl.'/admin/product/storage/product/'.$imageArr[0]
                ];
            }

            $i++;
        }

        return $productDetail;
    }

    /**
     * @return array
     */
    public function getAllProductDetails($id)
    {
        $baseUrl = url('/');
        $productDetails= [];

        $productInfo = $this->productApiRepository->getProductInfo($id);

        foreach ($productInfo as $product) {

            $productDescription = $this->productApiRepository->getProductDescription($product->id);
            $productImages = $this->productApiRepository->getProductImage($product->id);
            $categoryBenefit = $this->productApiRepository->categoryBenefit($product->category_id);

            $imageArr = json_decode($productImages->name);

            foreach ($categoryBenefit as $category) {

                foreach ($productDescription as $description) {

                    $productDetails[]['product_details']= [

                        'product_info' => [
                            'code' => $product->code,
                            'price' => $product->price,
                            'rank' => $product->rank,
                            'tag' => $product->tag,
                            'discount' => $product->discount,
                            'quantity_available' => $product->quantity_available,
                        ],

                        'product_description' => [
                            'description' => $description->description,
                            'information' => $description->information,
                        ],

                        'category_benefit' => [
                            'benefit_heading' => $category->benefit_heading,
                            'benefit' => $category->benefit,
                        ],

                        'products_mage' => [
                            'image' => $baseUrl.'/admin/product/storage/product/'.$imageArr[0]
                        ]
                    ];
                }
            }
        }

        return $productDetails;
    }
}