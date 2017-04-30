<?php

namespace App\Helpers;

use App\Rudraksha\Services\OrderService;
use Illuminate\Support\Facades\Auth;

class Helper
{
    /**
     * @var OrderService
     */
    public $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public static function count()
    {
        if (Auth::user()) {
            $user = Auth::user();
            $userId = $user->id;
            $result = \App\Rudraksha\Entities\OrderItem::where('customer_id', $userId)
                ->where('order_status', 'cart')
                ->get();

            return count($result);
        }
        return 0;
    }

    public static function summation()
    {
        if (Auth::user()) {

            $user = Auth::user();
            $userId = $user->id;
            $result = \App\Rudraksha\Entities\OrderItem::select('product_prices.price as prod_price', 'order_items.quantity', 'order_items.capping_id')
                ->where('customer_id', $userId)
                ->where('order_status', 'cart')
                ->join('product_prices', 'product_prices.product_id', 'order_items.product_id')
                ->get();

            $y = 0;
            foreach ($result as $item) {
                $capping = \App\Rudraksha\Entities\Capping::where('id', $item['capping_id'])->first();
                $x = ($item['prod_price'] * $item['quantity']) + (isset($capping['price']) ? $capping['price'] : '');
                $y = $y + $x;
            }
            return $y;
        }
        return 0;
    }
}