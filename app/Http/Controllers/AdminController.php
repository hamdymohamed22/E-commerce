<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //

    public function all_products()
    {
        $products = Product::all();
        $user = Auth::user();
        return view('admin.all_products', compact('products','user'));
    }
    public function create()
    {
        $user = Auth::user();
        return view('admin.create',compact('user'));
    }
    //search 

    public function search(Request $request)
    {
        // vallidate 
        $request->validate([
            "key"=> "required|string|max:255"
        ]);
        $key = $request->key;
        $products = Product::where("name","like","%$key%")->paginate(3);
        return view('user.home', compact('products'));
    }


    public function store(Request $request)
    {
        $data =  $request->validate([
            "name" => "required|string|max:255",
            "desc" => "required|string",
            "price" => "required|numeric|",
            "quantity" => "required|numeric",
            "image" => "required|mimes:jpg,jpeg,png",
        ]);
        // store 
        $data['image'] = Storage::putFile('products', $data['image']);
        Product::create($data);
        return redirect()->route('products')->with('success', "data inserted succssfuly");
    }

    // edit & update 
    public function edit($id)
    {
        $product = Product::findorFail($id);
        $user = Auth::user();
        return view('admin.edit_product',compact('product','user'));
    }

    public function update(Request $request , $id)
    {
        $data =  $request->validate([
            "name" => "required|string|max:255",
            "desc" => "required|string",
            "price" => "required|numeric|",
            "quantity" => "required|numeric",
            "image" => "image|mimes:jpg,jpeg,png",
        ]);

        $product = Product::findOrFail($id);


        if ($request->has('image')) {
            Storage::delete($product->image);
            $data['image'] = Storage::putFile('products', $data['image']);
        }
        // update 
        $product->update($data);
        return redirect()->route('products')->with('success', "data updated succssfuly");
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        // delete image 
        Storage::delete($product->image);
        // delete product 
        $product->delete();
        return redirect()->route('products')->with('success', "product deleted");
    }

}
