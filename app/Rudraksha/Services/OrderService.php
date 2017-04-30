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
use App\Rudraksha\Repositories\ProductRepository;

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
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * OrderService constructor.
     * @param OrderRepository $orderRepository
     * @param CappingRepository $cappingRepository
     */
    public function __construct(OrderRepository $orderRepository, CappingRepository $cappingRepository,ProductRepository $productRepository)
    {

        $this->orderRepository = $orderRepository;
        $this->cappingRepository = $cappingRepository;
        $this->productRepository = $productRepository;
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
           $image= $this->productRepository->get_productImage($order['product_id'])->toArray();
//           dd($image[0]['image']);
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
//                "image" => $order['image'],
                "image" => $image[0]['image'],

                "captype" => isset($capping['type']) ? $capping['type'] : '',
                "capprice" => isset($capping['price']) ? $capping['price'] : '',
            ];
        }
//        dd($data);
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


    public function cartGroupStore($data)
    {
        foreach($data['order_items_id'] as $orderid)
        {
            $this->orderRepository->updatestatus($orderid);
        }
        return $this->orderRepository->CartGroupStore($data);
    }


    public function getordergroupall()
    {
        return $this->orderRepository->getallgroups();
    }

    public function getordergroupbyGroupid($id)
    {
        $detail = [];
        $data = $this->orderRepository->getorderGroupbyid($id);
            $detail[$data['id']]=[];

            foreach ($data['order_items_id'] as $orderid) {

                $orders = $this->orderRepository->getOrderItembycartid($orderid);

                foreach ($orders as $order) {
                    $image= $this->productRepository->get_productImage($order['product_id'])->toArray();

                    $capping = $this->cappingRepository->get_cappingid($order['capping_id']);
                    $detail[$data['id']][] = [
                        "group_id" => $data['id'],
                        "cart_id" => $order['id'],
                        "order_group" => $data['order_group'],
                        "customer_id" => $data['customer_id'],
                        "group_status" => $data['group_status'],
                        "product_id" => $order['product_id'],
                        "quantity" => $order['quantity'],
                        "capping_id" => $order['capping_id'],
                        "currency_id" => $order['currency_id'],
                        "order_status" => $order['order_status'],
                        "created_at" => $order['created_at'],
                        "updated_at" => $order['updated_at'],
                        "prodname" => $order['prodname'],
                        "prodprice" => $order['prodprice'],
                        "customername" => $order['customername'],
                        "cname" => $order['cname'],
                        "customerlname" => $order['customerlname'],
                        "image" => $image[0]['image'],
                        "captype" => isset($capping['type']) ? $capping['type'] : '',
                        "capprice" => isset($capping['price']) ? $capping['price'] : '',
                    ];
                }
            }
        return $detail;
    }

    public function getordergroupbycustomerid($id)
    {
        return $this->orderRepository->getOrdergroupbyCusId($id);
    }

    public function ordergroupstatusUpdate($data, $id)
    {
        return $this->orderRepository->orderGroupStatusUpdate($data, $id);
    }


}