<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
use App\User;

class ProductListingByCategoryController extends Controller
{
    public function index(Request $request)
    {
        // dd($request);
        $categoryChildren = Category::categoryChildren();
        $products = Product::findByCategory($request->category_id)->get();
        if (Auth()->user()) {
            $user = User::with('wishlists')->find(Auth()->user()->id);
            return view('user.product-listing', compact('products', 'user', 'categoryChildren'));
        }
        $data = [$categoryChildren, $products];
        // return view('user.product-listing', compact('products', 'categoryChildren'));
        return response()->json($data);
    }
}
