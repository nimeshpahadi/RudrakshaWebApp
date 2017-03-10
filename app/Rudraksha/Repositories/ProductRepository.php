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

    public function __construct(ProductInfo $productInfo,ProductDescription $productDescription,ProductImage $productImage, Log $log,Category $category)
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
            dd($formData);
            $data=$this->productInfo->create($formData);
            $this->log->info("Product Created");
            return $data;
        } catch (QueryException $e) {
            $this->log->error(printf("Product Creation Failed %s",$e->getMessage()));
            return false;
        }
    }

    public function get_productbyId($id)
    {
        $query= $this->productInfo->select('*')->where('id',$id)->first();
        return $query;
    }

    public function storeProductDesc($formData)
    {
        try {
            $data=$this->productDescription->insert($formData);
            $this->log->info("Product Description Added");
            return $data;
        } catch (QueryException $e) {
            $this->log->error(printf("Product Description creation Failed %s",$e->getMessage()));
            return false;
        }
    }

    public function storeProductImage($formData)
    {
        try {
            $data = new ProductImage();
            $data->product_id = $formData['product_id'];
            foreach ($formData['name'] as $img) {
                $imagename[] = $data->product_id . '_'. $img . '_' . time() . '.' . $img->getClientOriginalExtension();

                foreach ($imagename as $image)
                {
                    $destinationPath = storage_path('app/public/product');
                     $data->name = $imagename;
//                   $img->move($destinationPath, $image);

                }
            }
//            dd($data);
            $data->save();
            $this->log->info("Product Image added");
            return $data;
        } catch (QueryException $e) {
            $this->log->error("Product Image Creation Failed");

            return false;
        }
    }

    public function getCategoryProduct()
    {
//        $query= $this->productInfo->select('product_infos.*','categories.name as cname','categories.id as cid')
//                                    ->join('categories','categories.id','product_infos.category_id')
//                                    ->where('categories.id','product_infos.category_id')
////                                    ->groupBy('categories.id')
//                                        ->get();


        $query= $this->category->select(DB::raw('product_infos.*,product_infos.category_id as catid,
        categories.name as cname,categories.id as cid'))
            ->join('product_infos','categories.id','product_infos.category_id')
//            ->groupBy('categories.name')
            ->get();
//        dd($query);
        return $query;

    }

    public function get_productDesc($id)
    {

        $query= $this->productDescription->select('*')->where('product_id',$id)->first();
//        dd($query);
        return $query;
    }

    public function get_productImage($id)
    {
        $query= $this->productImage->select('*')->where('product_id',$id)->get();
        return $query;
    }

}