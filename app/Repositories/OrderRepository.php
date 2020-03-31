<?php


namespace App\Repositories;
use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{
    public function all()
    {
        return Order::orderBy('order_amount')
            ->with('currencyOrigin')
            ->with('currencyEnd')
            ->get()
            ->map
            ->format();
    }

    public function findByReferenceCode($code)
    {
        return Order::where('order_reference_code',$code)
            ->with('currencyOrigin')
            ->with('currencyEnd')
            ->firstOrFail()
            ->format();

    }

    public function store(array $order)
    {
        Order::create($order);
    }
}