<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Order;
use App\User;

use Mockery\Exception;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index()
    {
        return OrderResource::collection(Order::with(['foods.category', 'user'])->latest()->get());
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        try
        {
            \DB::beginTransaction();
            $user = User::find($request->user_id);
            $order = new Order();
            $order->user()->associate($user);
            $order->address = $request->get('address', $user->address);
            $order->total_money = 0;
            if ($order->save()) {
                $order->foods()->sync($request->foods);
                foreach ($order->foods as $food)
                    $order->total_money += $food->price;

                if ($order->save()) {
                    \DB::commit();
                    return response('', 200);
                }
            }

            \DB::rollBack();
            return response('', 500);
        }
        catch (\Exception $exception)
        {
            \DB::rollBack();
            return response('', 500);
        }
    }

    public function show(Order $order)
    {

    }

    public function edit(Order $order)
    {

    }

    public function update(Request $request, Order $order)
    {

    }

    public function destroy(Order $order)
    {
        
    }
}
