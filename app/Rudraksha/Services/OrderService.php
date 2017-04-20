<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 4/18/17
 * Time: 12:29 PM
 */

namespace App\Rudraksha\Services;


use App\Rudraksha\Repositories\CappingRepository;
use App\Rudraksha\Repositories\OrderRepository;

class OrderService
{
    /**
     * @var OrderRepository
     */
    private $orderRepository;
    /**
     * @var CappingRepository
     */
    private $cappingRepository;

    /**
     * OrderService constructor.
     * @param OrderRepository $orderRepository
     * @param CappingRepository $cappingRepository
     */
    public function __construct(OrderRepository $orderRepository, CappingRepository $cappingRepository)
    {

        $this->orderRepository = $orderRepository;
        $this->cappingRepository = $cappingRepository;
    }

    public function order_itemStore($data)
    {
        return $this->orderRepository->OrderItemStore($data);
    }

    /**
     * get the orders added to cart also with capping
     * @param $id
     * @return array
     */
    public function getorderbyCustomerid($id)
    {
        $data = [];
        $orders = $this->orderRepository->getOrderItembyCustomerId($id);
        foreach ($orders as $order) {
            $capping = $this->cappingRepository->get_cappingid($order['capping_id']);
            $data[] = [
                "id" => $order['id'],
                "product_id" => $order['product_id'],
                "customer_id" => $order['customer_id'],
                "quantity" => $order['quantity'],
                "capping_id" => $order['capping_id'],
                "currency_id" => $order['currency_id'],
                "order_status" => $order['order_status'],
                "created_at" => $order['created_at'],
                "updated_at" => $order['updated_at'],
                "prodname" => $order['prodname'],
                "prodprice" => $order['prodprice'],
                "image" => $order['image'],
                "captype" => isset($capping['type'])?$capping['type']:'',
                "capprice" => isset($capping['price'])?$capping['price']:'',
            ];
        }
        return $data;

    }

    public function getorderbyId($oid)
    {
        return $this->orderRepository->getOrderItembyid($oid);
    }

    public function orderitemupdate($data, $id)
    {
        return $this->orderRepository->orderItemUpdate($data, $id);
    }

    public function deletecartitem($id)
    {
        return $this->orderRepository->deleteCartItem($id);
    }

    public function deleteallcartitem($id)
    {
        $cartids = $this->orderRepository->getOrderItembyCustomerId($id);
        return $this->orderRepository->deleteallCartItem($cartids);


    }


}