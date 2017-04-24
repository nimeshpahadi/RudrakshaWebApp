<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 4/23/17
 * Time: 4:37 PM
 */

namespace App\Rudraksha\Services\Api\Order;


use App\Rudraksha\Repositories\Api\Order\OrderGroupApiRepository;

class OrderGroupApiService
{
    /**
     * @var OrderGroupApiRepository
     */
    private $orderGroupApiRepository;

    /**
     * OrderGroupApiService constructor.
     * @param OrderGroupApiRepository $orderGroupApiRepository
     */
    public function __construct(OrderGroupApiRepository $orderGroupApiRepository)
    {
        $this->orderGroupApiRepository = $orderGroupApiRepository;
    }

    /**
     * @param $request
     * @return array
     */
    public function create($request)
    {
        $orderGroup = json_decode($request['order_items_id']);
        foreach($orderGroup as $orderId)
        {
            $this->orderGroupApiRepository->updateOrderStatus($orderId);
        }

        if ($this->orderGroupApiRepository->create($request)) {
            $response = [
                "status" => "true",
                "message" => "customer order group created successfully !!!"
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