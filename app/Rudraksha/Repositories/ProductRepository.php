<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 3/14/17
 * Time: 2:23 PM
 */

namespace App\Rudraksha\Repositories;

use App\Rudraksha\Entities\Category;
use File;
use App\Rudraksha\Entities\ProductDescription;
use App\Rudraksha\Entities\ProductImage;
use App\Rudraksha\Entities\ProductInfo;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ProductRepository
{
    /**
     * @var ProductInfo
     */
    private $productInfo;
    /**
     * @var Log
     */
    private $log;
    /**
     * @var ProductDescription
     */
    private $productDescription;
    /**
     * @var Category
     */
    private $category;
    /**
     * @var ProductImage
     */
    private $productImage;

    public function __construct(ProductInfo $productInfo, ProductDescription $productDescription, ProductImage $productImage, Log $log, Category $category)
    {
        $this->productInfo = $productInfo;
        $this->log = $log;
        $this->productDescription = $productDescription;
        $this->category = $category;
        $this->productImage = $productImage;
    }

    /**
     * store the product info
     * @param $formData
     * @return bool
     */
    public function storeProduct($formData)
    {
        try {
            $data = $this->productInfo->create($formData);
            $this->log->info("Product Created");
            return $data;
        } catch (QueryException $e) {
            $this->log->error("Product Creation Failed %s",[$e->getMessage()]);
            return false;
        }
    }

    public function get_productbyId($id)
    {
        $query = $this->productInfo->select('*')->where('id', $id)->first();
        return $query;
    }

    public function storeProductDesc($formData)
    {
        try {

            $data = $this->productDescription->insert($formData);
            $prodimage=$this->productImage->select('*')->where('product_id',$formData['product_id'])->first();

            if (isset($data)) {
                if (!empty($prodimage)){
                    $this->updatestatus($formData['product_id']);
                }
            }
            $this->log->info("Product Description Added");
            return $data;
        } catch (QueryException $e) {
            $this->log->error("Product Description creation Failed %s", [$e->getMessage()]);
            return false;
        }
    }

    public function storeProductImage($formData)
    {
        try {
            $t = $this->productImage->create($formData);
            $proddesc=$this->productDescription->select('*')->where('product_id',$t->product_id)->first();
            if (!empty($t)) {
                if (!empty($proddesc)){
                    $this->updatestatus($t->product_id);
                }
            }

            $this->log->info("Product Image added");
            return $t;

        } catch (QueryException $e) {

            $this->log->error("Product Image Creation Failed : ",[$e->getMessage()]);
            return false;
        }
    }


    private function updatestatus($id)
    {
        try {
            $data = ProductRepository::get_productbyId($id);
            $data->status = 1;
            $data->update();
            $this->log->info("Product Info status Updated", ['id' => $id]);

            return true;
        } catch (QueryException $e) {
            $this->log->error("Product status Update  Failed %s", ['id' => $id], [$e->getMessage()]);

            return false;
        }
    }


    /**
     * get the product as per category
     * @param $id
     * @return mixed
     */
    public function getCategoryProduct($id)
    {
        $query = $this->productInfo->select(DB::raw('product_infos.*'))
            ->join('categories', 'categories.id', 'product_infos.category_id')
            ->leftjoin('product_images', 'product_infos.id', 'product_images.product_id')
            ->where('product_infos.category_id', $id)
            ->groupBy('product_infos.id')
            ->orderBy('product_infos.rank')
            ->get()->toArray();

        return $query;

    }

    /** to get category as per product id
     * @param $id
     * @return mixed
     */
    public function get_productDesc($id)
    {

        $query = $this->productDescription->select('*')->where('product_id', $id)->first();
        return $query;
    }

    /** get product image as per product id
     * @param $id
     * @return mixed
     */
    public function get_productImage($id)
    {
        $query = $this->productImage->select('*')->where('product_id', $id)->orderBy('rank')->get();
        return $query;
    }

    /** get product image as per product id
     * @param $id
     * @return mixed
     */
    public function get_productImagebyid($id)
    {
        $query = $this->productImage->select('*')->where('id', $id)->first();
        return $query;
    }

    /**
     * get desc by id
     * @param $id
     * @return mixed
     */
    public function get_productdescid($id)
    {
        $query = $this->productDescription->select('*')->where('id', $id)->first();
        return $query;
    }
    public function all_product()
    {
        $query = $this->productInfo->select('*')->get();
        return $query;
    }

    public function editProductInfo($formData, $id)
    {

        try {
            $data = ProductRepository::get_productbyId($id);
            $data->category_id = $formData['category_id'];
            $data->code = $formData['code'];
            $data->name = $formData['name'];
            $data->rank = $formData['rank'];
            $data->status = $formData['status'];
            $data->tag = $formData['tag'];
            $data->discount = $formData['discount'];
            $data->quantity_available = $formData['quantity_available'];
            $data->update();
            $this->log->info("Product Info Updated", ['id' => $id]);

            return true;
        } catch (QueryException $e) {
            $this->log->error("Product Update  Failed %s", ['id' => $id], [$e->getMessage()]);

            return false;
        }
    }

    public function deleteProductInfo($id)
    {
        try {
            $query = $this->productInfo->find($id);
            $query->delete();
            $query;
            $this->log->info("Product Info Deleted",['id'=>$id]);
            return true;
        } catch (Exception $e) {
            $this->log->error("Product Info Deletion Failed",['id' => $id], [$e->getMessage()]);
            return false;
        }
    }

    public function deleteProductDesc($id)
    {
        try {
            $query = $this->productDescription->find($id);
            $query->delete();
            $query;
            $this->log->info("Product Description Deleted",['id'=>$id]);
            return true;
        } catch (Exception $e) {
            $this->log->error("Product Description Deletion Failed",['id' => $id], [$e->getMessage()]);
            return false;
        }
    }

    public function deleteProductImg($id)
    {
        try {
            $query = ProductRepository::get_productImagebyid($id);
            $query->delete();
            $query;
            $this->log->info("Product Image Deleted",['id'=>$id]);
            return true;

        } catch (Exception $e) {
            $this->log->error("Product Image Deletion Failed",['id' => $id], [$e->getMessage()]);
            return false;
        }
    }

    public function editProductDesc($formData, $id)
    {
        try {

            $data = ProductRepository::get_productdescid($id);
            $data->description = $formData['description'];
            $data->information = $formData['information'];
            $data->update();
            $this->log->info("Product Info Updated", ['id' => $id]);
            return true;
        } catch (QueryException $e) {
            $this->log->error("Product Update  Failed %s", ['id' => $id], [$e->getMessage()]);

            return false;
        }
    }


    public function getActiveProduct()
    {
        return $this->productInfo->select('*')->get();
    }

    public function updateProductStatus($formData, $id)
    {
        try {

            $data = ProductInfo::find($id);
            $data->status = $formData['status'];
            $data->update();
            $this->log->info("Product Info status Updated", ['id' => $id]);
            return true;
        } catch (QueryException $e) {
            $this->log->error("Product status Update  Failed %s", ['id' => $id], [$e->getMessage()]);

            return false;
        }
    }

    public function updateProductImageRank($formData, $id)
    {
        try {
            $data = ProductImage::find($id);
            $data->rank = $formData['rank'];
            $data->update();
            $this->log->info("Product Image Rank Updated", ['id' => $id]);
            return true;
        } catch (QueryException $e) {
            $this->log->error("Product image rank Update  Failed %s", ['id' => $id], [$e->getMessage()]);

            return false;
        }
    }


}