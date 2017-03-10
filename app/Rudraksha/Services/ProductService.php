<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 3/14/17
 * Time: 2:22 PM
 */

namespace App\Rudraksha\Services;


use App\Rudraksha\Repositories\ProductRepository;

class ProductService
{

    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * store the product
     * @param $request
     * @return bool
     */
    public function store_Product($request)
    {
        $formData = $request->all();
        $tags = explode("," , $formData['tag']);
//        dd($tags);
        $formData = array_except($formData, ['_token', 'to', 'remove']);
        $formData['tag'] = json_encode($tags);
        $data= $this->productRepository->storeProduct($formData);
       return $data;
    }

    public function get_product($id)
    {
        $data=$this->productRepository->get_productbyId($id);
        return $data;
    }

    public function store_ProductDesc($request)
    {
        $formData = $request->all();
        $formData = array_except($formData, ['_token', 'to', 'remove']);
        $formData['benifit'] = json_encode($formData['benifit']);
        $data= $this->productRepository->storeProductDesc($formData);
        return $data;
    }

    public function store_ProductImage($request)
    {
        $formData = $request->all();
//
        $formData = array_except($formData, ['_token', 'to', 'remove']);
        $data= $this->productRepository->storeProductImage($formData);
        return $data;
    }

    /**
     * to get all producta as per category
     * @return mixed
     */
    public function getProductasCategory()
    {
        $data=$this->productRepository->getCategoryProduct();
        return $data;
    }

    public function get_product_desc($id)
    {
        $data=$this->productRepository->get_productDesc($id);
        return $data;
    }

    public function get_product_image($id)
    {
        $data=$this->productRepository->get_productImage($id);
        return $data;
    }

}