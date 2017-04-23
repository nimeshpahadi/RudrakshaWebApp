<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 4/21/17
 * Time: 2:14 PM
 */

namespace App\Rudraksha\Repositories\Api\Order;


use App\Rudraksha\Entities\OrderItem;
use App\Rudraksha\Entities\ProductImage;
use App\Rudraksha\Entities\ProductInfo;
use App\Rudraksha\Entities\ProductPrice;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Database\QueryException;

class OrderApiRepository
{
    /**
     * @var OrderItem
     */
    private $orderItem;
    /**
     * @var Log
     */
    private $log;
    /**
     * @var ProductInfo
     */
    private $productInfo;
    /**
     * @var ProductPrice
     */
    private $productPrice;
    /**
     * @var ProductImage
     */
    private $productImage;

    /**
     * OrderApiRepository constructor.
     * @param OrderItem $orderItem
     * @param Log $log
     * @param ProductInfo $productInfo
     */
    public function __construct(OrderItem $orderItem, Log $log,
                                ProductInfo $productInfo,
                                ProductPrice $productPrice, ProductImage $productImage)
    {
        $this->orderItem = $orderItem;
        $this->log = $log;
        $this->productInfo = $productInfo;
        $this->productPrice = $productPrice;
        $this->productImage = $productImage;
    }

    /**
     * @param $request
     * @return bool
     */
    public function create($request)
    {
        try {
            $this->orderItem->create($request);
            $this->log->info("Customer Order Created");
            return true;

        } catch (QueryException $e) {
            $this->log->error("Customer Order Create Failed : ", [$e->getMessage()]);
            return false;
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getOrderItemByCustomerId($id)
    {
        $query = $this->orderItem->select('order_items.*')
//            ->join('product_infos','product_infos.id','order_items.product_id')
//            ->join('product_prices','product_infos.id','product_prices.product_id')
//            ->join('product_images','product_infos.id','product_images.product_id')
            ->where('customer_id',$id)
            ->where('order_status','cart')
            ->get();
        return $query;
    }

    /**
     * @param $request
     * @param $id
     * @return bool
     */
    public function edit($request, $id)
    {
        try {
            $data = OrderItem::find($id);
            $data->product_id = $request['product_id'];
            $data->customer_id = $request['customer_id'];
            $data->currency_id = $request['currency_id'];
            $data->capping_id = $request['capping_id'];
            $data->quantity = $request['quantity'];
            $data->order_status = $request['order_status'];

            $data->update();

            $this->log->info("Customer Address Updated");

            return true;

        } catch (QueryException $e) {
            $this->log->error("Customer Address Update Failed : ", [$e->getMessage()]);
            return false;
        }
    }

    /**
     * @param $id
     * @return bool
     */
    public function destroy($id)
    {
        try {
            $query = $this->orderItem->find($id);
            $query->delete();
            $this->log->info("Cart Item Deleted",['id'=>$id]);
            return true;
        } catch (QueryException $e) {
            $this->log->error("Cart item Deletion Failed",['id' => $id], [$e->getMessage()]);
            return false;
        }
    }

    /**
     * @param $ids
     * @return bool
     */
    public function deleteAll($ids)
    {
        try {
            foreach ( $ids as $id) {
                $query = $this->orderItem->find($id['id']);
                $query->delete();
            }
            $this->log->info("All Cart Item Deleted");
            return true;
        } catch (QueryException $e) {
            $this->log->error("Cart Item Clear  Failed", [$e->getMessage()]);
            return false;
        }
    }

    /**
     * @param $product_id
     * @return mixed
     */
    public function getProductInfo($product_id)
    {
        return $this->productInfo->select('*')
                ->where('id', $product_id)
                ->first();
    }

    /**
     * @param $product_id
     * @return mixed
     */
    public function getProductPrice($product_id)
    {
        return $this->productPrice->select('*')
                ->where('id', $product_id)
                ->first();
    }

    /**
     * @param $product_id
     * @return mixed
     */
    public function getProductImage($product_id)
    {
        return $this->productImage->select('*')
                ->where('id', $product_id)
                ->first();
    }
}