<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 4/18/17
 * Time: 12:31 PM
 */

namespace App\Rudraksha\Repositories;


use App\Rudraksha\Entities\Capping;
use App\Rudraksha\Entities\OrderItem;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Logging\Log;

class OrderRepository
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
     * @var Capping
     */
    private $capping;

    public function  __construct(OrderItem $orderItem,Log $log, Capping $capping)
 {
     $this->orderItem = $orderItem;
     $this->log = $log;
     $this->capping = $capping;
 }

    /**
     * place the order item in cart
     * @param $data
     * @return bool
     */
    public function OrderItemStore($data)
    {
        try {
            $this->orderItem->create($data);
            $this->log->info("Order added to cart successfully");
            return true;
        } catch (QueryException $e) {
            $this->log->error("Order not placed to cart", [$e->getMessage()]);
            return false;
        }
    }

    /**
     * generate the items in the cart for specific user login
     * @param $id
     * @return mixed
     */
    public function getOrderItembyCustomerId($id)
    {
        $query=$this->orderItem->select('order_items.*','product_infos.name as prodname',
            'product_prices.price as prodprice','product_images.image')
            ->join('product_infos','product_infos.id','order_items.product_id')
            ->join('product_prices','product_infos.id','product_prices.product_id')
            ->join('product_images','product_infos.id','product_images.product_id')
            ->where('customer_id',$id)
            ->where('order_status','cart')
            ->get()->toArray();
        return $query;

    }

    /**
     * get order item  by its id
     * @param $oid
     * @return mixed
     */
    public function getOrderItembyid($oid)
    {
        return $this->orderItem->select('*')->where('id',$oid)->first();
    }

    public function orderItemUpdate($data, $id)
    {
        try {
            $query = OrderItem::find($id);
            $query->quantity = $data['quantity'];
            $query->capping_id = $data['capping_id'];
            $query->update();
            $this->log->info("Order Item Updated", ['id' => $id]);
            return true;

        } catch (QueryException $e) {
            $this->log->error("Order item Update Failed", ['id' => $id]);
            return false;
        }
    }

    /**
     * delete single cart item from the current cart
     * @param $id
     * @return bool
     */
    public function deleteCartItem($id)
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
     * clear all the items from the cart of loggedin user
     * @param $ids
     * @return bool
     */
    public function deleteallCartItem($ids)
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


}