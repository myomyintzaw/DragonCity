<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //Add to cart function
    public function add(Request $request)
    {
        // logger($request->all());
        // logger($request);

        $data = [
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'qty' => $request->qty,
        ];

        Cart::create($data);

        return response(200);
        // ->json(['status'=>'success','data'=>$data]);
    }




    //View Cart Page
    public function cart()
    {
        $cart_items = Cart::where('carts.user_id', Auth::user()->id)
            ->select('carts.*', 'products.name as product_name', 'products.price as product_price', 'products.image as product_image')
            ->leftJoin('products', 'carts.product_id', 'products.id')
            // ->orderBy('id','desc')
            ->get();

            $AllTotal = 0;
            foreach($cart_items as $item){
                $AllTotal += $item->qty * $item->product_price;
            }
            // logger($AllTotal);

            // dd($cart_items->toArray());
            return view('cart',compact('cart_items','AllTotal'));
        // return view('cart', ['cart_items' => $cart_items]);

    }


    //Delete Product In Cart
    public function deleteProduct(Request $request){
        // logger($request);
        Cart::where('id',$request->cartId)
        ->where('user_id',Auth::user()->id)
        ->delete();
    }

   //Cart Clear
   public function cartClear(){
    Cart::where('user_id',Auth::user()->id)->delete();
    return redirect()->route('dragoncity.home');
   }



}
