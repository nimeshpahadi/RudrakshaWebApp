<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 4/23/17
 * Time: 4:43 PM
 */

namespace App\Rudraksha\Repositories\Api\Order;


use App\Rudraksha\Entities\OrderGroup;
use App\Rudraksha\Entities\OrderItem;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Database\QueryException;

class OrderGroupApiRepository
{
    /**
     * @var OrderGroup
     */
    private $orderGroup;
    /**
     * @var Log
     */
    private $log;
    /**
     * @var OrderItem
     */
    private $orderItem;

    /**
     * OrderGroupApiRepository constructor.
     * @param OrderGroup $orderGroup
     * @param Log $log
     * @param OrderItem $orderItem
     */
    public function __construct(OrderGroup $orderGroup,
                                Log $log, OrderItem $orderItem)
    {
        $this->orderGroup = $orderGroup;
        $this->log = $log;
        $this->orderItem = $orderItem;
    }

    /**
     * @param $orderId
     * @return bool
     */
    public function updateOrderStatus($orderId)
    {
        try {
            $data= OrderItem::find($orderId);
            $data->order_status= 'processing';
            $data->update();
            $this->log->info("Order Group Status Updated", ['id' => $orderId]);
            return true;
        } catch (QueryException $e) {
            $this->log->error("Order Group Update Failed %s", ['id' => $orderId], [$e->getMessage()]);
            return false;
        }
    }

    /**
     * @param $request
     * @return bool
     */
    public function create($request)
    {
        try {
            $this->orderGroup->create($request);
            $this->log->info("Order group Created Successfully");
            return true;
        } catch (QueryException $e) {
            $this->log->error("Order Group Not Placed ", [$e->getMessage()]);
            return false;
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getOrderGroupByCusId($id)
    {
        return $this->orderGroup->select('*')
            ->where('customer_id', $id)
            ->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function customerOrderHistoryDetails($id)
    {
        $query = $this->orderGroup->select('order_items_id')
            ->where('id', $id)
            ->first();
        return $query;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getOrderItemId($id)
    {
        return $this->orderItem->select('quantity', 'order_status')
            ->where('id', $id)
            ->first();
    }
}