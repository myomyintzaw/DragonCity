<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //Category Page
    public function Page()
    {
        return view('admin.category');
    }

    //Category Create
    public function create(Request $request)
    {
        $this->vali($request);

        Category::create([
            'name' => $request->categoryName,
            'description' => $request->categoryDescription,
        ]);

        return back()->with(['success' => 'Category creation success']);
    }



    //Category List
    public function list()
    {
        $cdata = Category::paginate(6);
        return view('admin.categoryList', compact('cdata'));
    }

    //category List Search
    public function search(Request $request)
    {
        // dd($request->toArray());
        $search = $request->search;
        $cdata = Category::where(function ($query) use ($search) {
            $query->where('id', 'like', "%$search%")
                ->orWhere('name', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%");
        })->paginate(6);
        return view('admin.categoryList', compact('cdata','search'));
    }




    //Category Edit
    public function edit($id)
    {
        $cdata = Category::where('id', $id)->first();
        return view('admin.categoryEdit', compact('cdata'));
    }




    //Category Update
    public function update($id, Request $request)
    {
        // dd($id);

        $this->vali($request);
        $data = $this->dataArrange($request);
        Category::where('id', $id)->update($data);

        return redirect()->route('category.list')->with(['success' => 'category update success']);
    }


    //Category Delete
    public function delete($id)
    {
        // dd($id);
        Category::where('id', $id)->delete();

        return back()->with(['success' => 'Category delete success']);
    }



    //Data Arrange
    private function dataArrange($request)
    {
        return [
            'name' => $request->categoryName,
            'description' => $request->categoryDescription,
        ];
    }



    //Category Validation
    private function vali($request)
    {
        Validator::make($request->all(), [
            'categoryName' => 'required',
            'categoryDescription' => 'required',
        ])->validate();
    }
}
