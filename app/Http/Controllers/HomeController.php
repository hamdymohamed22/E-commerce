<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function admin_dashboard(){
        if (Auth::user()->role == "admin") {
            $user = Auth::user();
            
            return view('admin.home', compact('user'));
        }elseif (Auth::user()->role == "user") {
           $products =  Product::paginate(3);
            return view('user.home',compact('products'));
        }
    }
    public function home(){

        $products =  Product::paginate(9);
        return view('user.home', compact('products'));
    }
    public function all_products(){
        $products =  Product::all();
        return view('user.all_products', compact('products'));
    }
}
