<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products  = Product::with('categories')->get();
        $categories = Category::all();
        return view('frontend.products.index',compact('products','categories'));
    }
   
    public function getAllProducts(){
        $products  = Product::with('categories')->get();
        return response()->json($products);
    }

    public function getProductsByCategory(Request $request)
    {
        $categories = $request->input('categories');  

        $products = Product::whereHas('categories', function ($query) use ($categories) {
            $query->whereIn('category_id', $categories);
        })->get();

        return response()->json($products);
    }

    public function detail($slug){
        $product  = Product::where('slug',$slug)->first();
        return view('frontend.products.detail',compact('product'));
    }


    public function search(Request $request)
{
    $query = $request->input('query');
    $products = Product::where('name', 'LIKE', '%' . $query . '%')->get();
    return view('frontend.products.search_results', compact('products', 'query'));
}

}
