<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 4/21/17
 * Time: 2:48 PM
 */

namespace App\Rudraksha\Services\Api\Order;


use App\Rudraksha\Repositories\Api\Capping\CappingApiRepository;
use App\Rudraksha\Repositories\Api\Order\OrderApiRepository;

class OrderApiService
{
    /**
     * @var OrderApiRepository
     */
    private $orderApiRepository;
    /**
     * @var CappingApiRepository
     */
    private $cappingApiRepository;

    /**
     * OrderApiService constructor.
     * @param OrderApiRepository $orderApiRepository
     * @param CappingApiRepository $cappingApiRepository
     */
    public function __construct(OrderApiRepository $orderApiRepository, CappingApiRepository $cappingApiRepository)
    {
        $this->orderApiRepository = $orderApiRepository;
        $this->cappingApiRepository = $cappingApiRepository;
    }

    /**
     * @param $request
     * @return array
     */
    public function create($request)
    {
        $order = [
            'product_id' => $request['product_id'],
            'customer_id' => $request['customer_id'],
            'currency_id' => $request['currency_id'],
            'capping_id' => $request['capping_id'],
            'quantity' => $request['quantity'],
            'order_status' => $request['order_status'],
        ];

        if ($this->orderApiRepository->create($order)) {
            $response = [
                "status" => "true",
                "message" => "customer order created successfully !!!"
            ];
            return $response;
        }

        $response = [
            "status" => "false",
            "message" => "oops !!! something went wrong"
        ];
        return $response;
    }

    /**
     * @param $id
     * @return array
     */
    public function show($id)
    {
        $data = [];
        $orders = $this->orderApiRepository->getOrderItemByCustomerId($id);
        $baseUrl = url('/');

        foreach ($orders as $order) {
            $productInfo = $this->orderApiRepository->getProductInfo($order->product_id);
            $productPrice = $this->orderApiRepository->getProductPrice($order->product_id);
            $productImage = $this->orderApiRepository->getProductImage($order->product_id);
            $capping = $this->cappingApiRepository->getCappingId($order->capping_id);

            $data[] = [
                "id" => $order->id,
                "product_id" => $productInfo->id,
                "product_name" => $productInfo->name,
                "product_price" => $productPrice->price,
                "customer_id" => $order->customer_id,
                "capping_id" => $order->capping_id,
                "currency_id" => $order->currency_id,
                "quantity" => $order->quantity,
                "capping_type" => isset($capping->type)?$capping->type:'',
                "capping_price" => isset($capping->price)?$capping->price:'',
                "image" => $baseUrl.'/storage/image/product/'.$productImage->image,
            ];
        }
        return $data;
    }

    /**
     * @param $request
     * @param $id
     * @return array
     */
    public function edit($request, $id)
    {
        if ($this->orderApiRepository->edit($request, $id)) {
            $response = [
                "status" => "true",
                "message" => "customer order updated successfully !!!"
            ];
            return $response;
        }

        $response = [
            "status" => "false",
            "message" => "oops !!! something went wrong"
        ];
        return $response;
    }

    /**
     * @param $id
     * @return bool
     */
    public function destroy($id)
    {
        if ($this->orderApiRepository->destroy($id)) {
            $response = [
                "status" => "true",
                "message" => "customer order deleted successfully !!!"
            ];
            return $response;
        }

        $response = [
            "status" => "false",
            "message" => "oops !!! something went wrong"
        ];
        return $response;
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteAll($id)
    {
        $cartids = $this->orderApiRepository->getOrderItemByCustomerId($id);

        if ($this->orderApiRepository->deleteAll($cartids)) {
            $response = [
                "status" => "true",
                "message" => "all order deleted successfully !!!"
            ];
            return $response;
        }

        $response = [
            "status" => "false",
            "message" => "oops !!! something went wrong"
        ];
        return $response;
    }
}