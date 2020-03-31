<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Repositories\OrderRepository;
use App\Models\Order;

use Illuminate\Support\Facades\Auth;
use Validator;

class OrdersController extends Controller
{
    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->OrderRepository = $orderRepository;
    }

    public function show(Request $request)
    {
        $order = $this->OrderRepository->findByReferenceCode($request['code']);
        return response()->json(['order'=>$order], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email',
            'amount'    => 'required|integer',
            'origin_id' => 'required|integer',
            'end_id'    => 'required|integer',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $input = $request->all();
        $order_reference_code = uniqid();
        $order = array(
            'order_email' => $input['email'],
            'order_amount' => $input['amount'],
            'order_currency_id_origin' => $input['origin_id'],
            'order_currency_id_end' => $input['end_id'],
            'order_reference_code' => $order_reference_code,
        );
        $this->OrderRepository->store($order);
        return response()->json(['order_reference_code'=>$order_reference_code], 200);
    }
}
