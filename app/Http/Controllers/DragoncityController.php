<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DragoncityController extends Controller
{
    //DragonCity Welcome Page
    public function home()
    {
        $productData = Product::get();
        $categoryData = Category::get();
        $cartData=Cart::where('user_id',auth()->id())->get();

        // if(Auth::user()){
        // $cartData=Cart::where('user_id',auth()->id)->get();
        // }else{
        //     $cartData=[];
        // }

        return view('dragoncity', compact('productData', 'categoryData', 'cartData'));
    }

    //DragonCity Shop Page
    public function shop($id)
    {
        $data = $productData = Product::where('products.id', $id)
            ->select('products.*', 'categories.name as category_name')
            ->leftJoin('categories', 'products.category_id', 'categories.id')
            ->first();

        return view('shop', compact('data'));
    }
}
