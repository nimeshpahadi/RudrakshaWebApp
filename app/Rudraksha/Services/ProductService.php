<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 3/14/17
 * Time: 2:22 PM
 */

namespace App\Rudraksha\Services;


use App\Rudraksha\Repositories\CategoryRepository;
use App\Rudraksha\Repositories\ProductPriceRepository;
use App\Rudraksha\Repositories\ProductRepository;
use File;

class ProductService
{

    /**
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;
    /**
     * @var ProductPriceRepository
     */
    private $productPriceRepository;

    /**
     * ProductService constructor.
     * @param ProductRepository $productRepository
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository,ProductPriceRepository $productPriceRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productPriceRepository = $productPriceRepository;
    }

    /**
     * store the product
     * @param $request
     * @return bool
     */
    public function store_Product($request)
    {
        $formData = $request->all();
        $tags = explode(",", trim($formData['tag']));
        foreach ($tags as $key => $value) {
            if (trim($value) == "") {
                unset($tags[$key]);
            }
        }
        $formData = array_except($formData, ['_token', 'to', 'remove']);
        $formData['tag'] = $tags;
        $data = $this->productRepository->storeProduct($formData);
        return $data;
    }

    public function get_product($id)
    {
        $data = $this->productRepository->get_productbyId($id);
        return $data;
    }

    public function store_ProductDesc($request)
    {
        $formData = $request->all();
        $formData = array_except($formData, ['_token', 'to', 'remove']);
        $data = $this->productRepository->storeProductDesc($formData);
        return $data;
    }

    public function store_ProductImage($request)
    {
        $formData = $request->all();
        $formData = array_except($formData, ['_token', 'to', 'remove']);
        $imagename = $formData['product_id'] . '_' . rand(0, 10000) . '.' . $formData['image']->getClientOriginalExtension();
        $destinationPath = storage_path('app/public/image/product');
        $formData['image']->move($destinationPath, $imagename);
        $formData['image'] = $imagename;
        return $this->productRepository->storeProductImage($formData);

    }

    /**
     * to get all producta as per category
     * @return mixed
     */
    public function getProductasCategory()
    {

        $data = [];
        $cat = $this->categoryRepository->getCategory();
        foreach ($cat as $cate) {
            $data[$cate->name] = [];
            $products = $this->productRepository->getCategoryProduct($cate->id);
            foreach ($products as $product)
            {
                $price = $this->productPriceRepository->getProductPricebyProductId($product['id'])->toArray();
//dd($price);
                $images = $this->productRepository->get_productImage($product['id'])->toArray();
//                dd($images);
                $data[$cate->name]["product"][]=[
                    "id"=>$product['id'],
                    "name"=>$product['name'],
                    "code"=>$product['code'],
                    "quantity_available"=>$product['quantity_available'],
                    "tag"=>$product['tag'],
                    "discount"=>$product['discount'],
                    "rank"=>$product['rank'],
                    "image"=>$images,
                    "price" =>$price


                ];
            }

        }
        return $data;
    }

    public function get_product_desc($id)
    {
        $data = $this->productRepository->get_productDesc($id);
        return $data;
    }

    public function get_product_image($id)
    {
        $data = $this->productRepository->get_productImage($id);

        return $data;
    }

    public function allProduct()
    {
        $data = $this->productRepository->all_product();
        return $data;
    }

    public function edit_productInfo($request, $id)
    {

        $formData = $request->all();
        $tags = explode(",", $formData['tag']);
        $formData = array_except($formData, ['_token', 'to', 'remove']);
        $formData['tag'] = $tags;
        $data = $this->productRepository->editProductInfo($formData, $id);
        return $data;
    }

    public function deleteproductInfo($id)
    {
        $data = $this->productRepository->deleteProductInfo($id);
        return $data;
    }

    public function deleteproductDesc($id)
    {
        $descid = $this->productRepository->get_productDesc($id);
        $data = $this->productRepository->deleteProductDesc($descid->id);
        return $data;
    }

    public function deleteproductImage($id)
    {
        $query = $this->productRepository->get_productImagebyid($id);
        $imagename = $query->image;
        $path = storage_path() . '/app/public/image/product/';
        File::delete($path . $imagename);
        $data = $this->productRepository->deleteProductImg($id);
        return $data;
    }

    public function edit_productDesc($request, $id)
    {
        $formData = $request->all();
        $formData = array_except($formData, ['_token', 'to', 'remove']);
        $data = $this->productRepository->editProductDesc($formData, $id);
        return $data;
    }


    public function getactiveproduct()
    {
        return $this->productRepository->getActiveProduct();
    }

    public function get_product_image_rank($productid)
    {
        $data = $this->productRepository->get_productImage($productid)->toArray();
        $imgRank = [];
        foreach ($data as $d) {

            $imgRank[] = $d['rank'];
        }
        $rank = array_diff(config('imagerank'), $imgRank);
        return $rank;

    }
}