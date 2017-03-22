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
        $baseUrl = url('/');

        $categoryData = $this->categoryRepository->getCategory();

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

                        'productInfo' => [
                            'code' => $product->code,
                            'price' => $product->price,
                            'rank' => $product->rank,
                            'tag' => $product->tag,
                            'discount' => $product->discount,
                            'quantity_available' => $product->quantity_available,
                        ],

                        'productDescription' => [
                            'description' => $description->description,
                            'information' => $description->information,
                        ],

                        'categoryBenefit' => [
                            'benefit_heading' => $category->benefit_heading,
                            'benefit' => $category->benefit,
                        ],

                        'productsImage' => [
                            'image' => $baseUrl.'/admin/product/storage/product/'.$imageArr[0]
                        ]
                    ];
                }
            }
        }

        return $productDetails;
    }
}