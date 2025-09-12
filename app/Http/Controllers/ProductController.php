<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //Product Page
    public function page()
    {
        $data = Category::get();
        return view('admin.product', compact('data'));
    }

    //Product Create
    public function create(Request $request)
    {

        // dd($request->toArray());
        $this->vali($request);
        $data = $this->dataArrange($request);
        if ($request->hasFile('productImage')) {
            $imageName = uniqid() . $request->file('productImage')->getClientOriginalName();
            $request->file('productImage')->storeAs('public/products', $imageName);
            $data['image'] = $imageName;
        }

        Product::create($data);

        return back()->with(['success' => 'Product creation success']);
    }


    //Product List
    public function list()
    {
        // $data = Product::with('category')
        $data = Product::select('products.*', 'categories.name as category_name')
            // ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('categories', 'products.category_id', 'categories.id')
            ->paginate(7);

        return view('admin.productList', compact('data'));
    }

    //Product List Search
    public function search(Request $request)
    {
        $search = $request->search;
        // User::leftJoin('posts', 'users.id', '=', 'posts.user_id')
        //     ->select('users.*', 'posts.title')
        //     ->where('users.name', 'like', '%john%')
        //     ->get();


        $data = Product::leftJoin('categories', 'products.category_id', 'categories.id')
            ->select('products.*', 'categories.name as category_name')
            // ->where('products.name', 'like', "%$search%")
            ->where(function ($query) use ($search) {
                $query->where('products.id', 'like', "%$search%")
                    ->orWhere('products.name', 'like', "%$search%")
                    ->orWhere('products.series', 'like', "%$search%")
                    ->orWhere('products.description', 'like', "%$search%")
                    ->orWhere('products.price', 'like', "%$search%")
                    ->orWhere('categories.name', 'like', "%{$search}%");
            })->paginate(5);

        return view('admin.productList', compact('data', 'search'));
    }

    //Product Detail
    public function detail($id)
    {
        // $data = Product::where('id', $id)->with('category')->first();
        $data = Product::where('products.id', $id)
            // ->select('products.*','categories.name as category_name')
            ->leftJoin('categories', 'products.category_id', 'categories.id')
            ->select('products.*', 'categories.name as category_name')
            ->first();
        return view('admin.productDetail', compact('data'));
    }

    //Product Edit
    public function edit($id)
    {
        $productData = Product::where('id', $id)->first();
        $categoryData = Category::get();
        // $categories=Category::select('id','name')->get();

        return view('admin.productEdit', compact('productData', 'categoryData'));
    }


    //Product Update
    public function update(Request $request, $id)
    {
        $this->vali($request);
        $data = $this->dataArrange($request);
        // dd($data);


        //Product Image Store
        if ($request->hasFile('productImage')) {
            $dbImage = Product::where('id', $id)->value('image');

            //Delete old image from storage files
            if ($dbImage != null) {
                Storage::delete('public/products/' . $dbImage);
                // dd('public/products/' . $dbImage);
            }
            $imageName = uniqid() . $request->file('productImage')->getClientOriginalName();
            $request->file('productImage')->storeAs('public/products', $imageName);
            $data['image'] = $imageName;
        }
        // dd($data);
        Product::where('id', $id)->update($data);

        return back()->with(['success' => 'Product update success']);
    }


    //Product Delete
    public function delete($id)
    {

        $dbImage = Product::where('id', $id)->value('image');
        //Delete old image from storage files
        if ($dbImage != null) {
            Storage::delete('public/products/' . $dbImage);
            // dd('public/products/' . $dbImage);
        }

        Product::where('id', $id)->delete();
        return back()->with(['success' => 'product delete success']);
    }






    //Private Function for Data Arrange
    private function dataArrange($request)
    {
        return [
            'name' => $request->productName,
            'series' => $request->productSeries,
            'category_id' => $request->categoryId,
            'description' => $request->productDescription,
            'price' => $request->productPrice,
        ];
    }

    //Private Function for Validation
    private function vali($request)
    {
        $rules = [
            'productName' => 'required',
            'productSeries' => 'required',
            'categoryId' => 'required',
            'productDescription' => 'required',
            'productPrice' => 'required',
            'productImage' => 'required | image | mimes:jpeg,jpg,png,webp',
        ];

        Validator::make($request->all(), $rules)->validate();
    }
}
