<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    //Order from Cart
    public function order(Request $request)
    {
        $subTotal = 0;
        // logger($request);

        // looping and put data to Order Detail and Order Tables
        foreach ($request->all() as $order) {
            $data = OrderDetail::create([
                'user_id' => Auth::user()->id,
                'product_id' => $order['productId'],
                'order_number' => $order['orderNumber'],
                'qty' => $order['qty'],
                'total' => $order['total'],
            ]);
            // $info = OrderDetail::create($data);
            $subTotal += $order['total'];
        }
        //End  looping and put data to Order Detail and Order Tables

        //adding data to Order Table
        Order::create([
            'order_number' => $data->order_number,
            'user_id' => Auth::user()->id,
            'total_amount' => $subTotal + 10,
        ]);

        //Cart delete
        Cart::where('user_id', Auth::user()->id)->delete();

        return response(200);
    }


    //Order List (Admin Dashboard)
    public function orderList()
    {
        $data = Order::select('orders.*', 'users.name as user_name')
            ->leftJoin('users', 'users.id', 'orders.user_id')
            //    ->orderBy('orders.id','desc')
            ->paginate(6);
        return view('admin.orderList', compact('data'));
    }

    //Order Deliver
    public function orderDeliver($number)
    {
        Order::where('order_number', $number)->update(['order_delivered' => 1]);
        return back()->with(['success' => 'Order is delivered']);
    }


    //Order Delete
    public function orderDelete($number)
    {
        Order::where('order_number', $number)->delete();
        OrderDetail::where('order_number', $number)->delete();

        return back()->with(['success' => 'Order is Deleted!']);
    }
}
