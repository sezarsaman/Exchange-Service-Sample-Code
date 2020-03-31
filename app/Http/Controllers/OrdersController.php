<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{
    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->OrderRepository = $orderRepository;
    }

    public function index(){
        $orders = $this->OrderRepository->all();
        return $orders;
    }

    public function order(Request $request)
    {
        $order = $this->OrderRepository->findByReferenceCode($request['code']);
        return $order;
    }

    public function store(Request $request)
    {
        print_r($request);
    }
}
