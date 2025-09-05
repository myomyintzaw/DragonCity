<?php

namespace App\Http\Controllers;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    //Order Detail
    public function orderDetail($number)
    {
       $data=OrderDetail::where('order_details.order_number', $number)
            ->select(
                'Order_details.*',
                'products.name as product_name',
                'products.price as product_price',
                'products.image as product_image'
            )->leftJoin('products', 'products.id', 'order_details.product_id')->get();

        return view('admin.orderDetail',compact('data'));
    }
}
