<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 3/14/17
 * Time: 2:22 PM
 */

namespace App\Rudraksha\Services;


use App\Rudraksha\Repositories\CategoryRepository;
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
     * ProductService constructor.
     * @param ProductRepository $productRepository
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
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
        $formData = array_except($formData, ['_token', 'to', 'remove']);
        $formData['tag'] = $tags;
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
        $data= $this->productRepository->storeProductDesc($formData);
        return $data;
    }

    public function store_ProductImage($request)
    {
        $formData = $request->all();
        $formData = array_except($formData, ['_token', 'to', 'remove']);
        $data =[];
        $images=[];
        $data['product_id'] =$formData['product_id'];
        foreach ($formData['name'] as $img) {
            $imagename = $formData['product_id']. '_' . rand(0,10000) . '.' . $img->getClientOriginalExtension();
            array_push($images,$imagename);
            $destinationPath = storage_path('app/public/product');
            $img->move($destinationPath, $imagename);
        }

        $data['name']=$images;
        return $this->productRepository->storeProductImage($data);

    }

    /**
     * to get all producta as per category
     * @return mixed
     */
    public function getProductasCategory()
    {

        $data = [];
        $cat=$this->categoryRepository->getCategory();
        foreach ($cat as $cate) {
            $data[$cate->name] = [];
            $data[$cate->name]["product"] = $this->productRepository->getCategoryProduct($cate->id);
            }
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

    public function allProduct()
    {
        $data=$this->productRepository->all_product();
        return $data;
    }

    public function edit_productInfo($request, $id)
    {

        $formData = $request->all();
        $tags = explode("," , $formData['tag']);
        $formData = array_except($formData, ['_token', 'to', 'remove']);
        $formData['tag'] = $tags;
        $data=$this->productRepository->editProductInfo($formData,$id);
        return $data;
    }

    public function deleteproductInfo($id)
    {
        $data=$this->productRepository->deleteProductInfo($id);
        return $data;
    }

    public function deleteproductDesc($id)
    {
        $descid=$this->productRepository->get_productDesc($id);
        $data=$this->productRepository->deleteProductDesc($descid->id);
        return $data;
    }

    public function deleteproductImage($id,$name)
    {
        $query = $this->productRepository->get_productImagebyid($id);
        $namearray=($query->name);
        $imageKey=array_search($name,$namearray);
        unset($namearray[$imageKey]);
        $path = storage_path().'/app/public/product/';
        File::delete($path . $name);
        $data=$this->productRepository->deleteProductImg($id,$namearray);
        return $data;
    }

    public function edit_productDesc($request, $id)
    {
        $formData = $request->all();
        $formData = array_except($formData, ['_token', 'to', 'remove']);
        $data= $this->productRepository->editProductDesc($formData,$id);
        return $data;
    }

    public function edit_productImage($request, $id)
    {

        $formData = $request->all();
        $formData = array_except($formData, ['_token', 'to', 'remove']);
        $data =[];
        $images=[];
        foreach ($formData['name'] as $img) {
            $imagename = $formData['product_id']. '_' . rand(0,10000) . '.' . $img->getClientOriginalExtension();
            array_push($images,$imagename);
            $destinationPath = storage_path('app/public/product');
            $img->move($destinationPath, $imagename);
        }

        $data['name']=$images;
        return $this->productRepository->editProductImage($data,$id);





    }
}