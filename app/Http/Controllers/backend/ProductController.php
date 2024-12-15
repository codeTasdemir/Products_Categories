<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('categories')->get();
        return view('backend.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'nullable',
            'price'=>'required:numeric',
            'categories' => 'nullable|array',
            'image'=>'nullable|image|max:2048'
        ]);

        $image = $request->file('image') ? $request->file('image')->store('products','public') : null;
        $product = Product::create(array_merge($request->except('categories'),['image'=> $image]));
        $product->categories()->sync($request->categories);       
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('backend.products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $product = Product::find($id);
            $request->validate([
                'name' => 'required',
                'price' => 'required|numeric',
                'description'=>'nullable',
                'categories' => 'nullable|array',
                'image' => 'nullable|image|max:2048'
            ]);
        
        
            if ($request->hasFile('image')) {
                if ($product->image) {
                    Storage::disk('public')->delete($product->image);
                }
                $image = $request->file('image')->store('products', 'public');
            } else {
                $image = $product->image;
            }
        
            $product->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $image
            ]);
        
            if($request->has('categories')){
                $product->categories()->sync($request->categories);
            }
            else{
                $product->categories()->detach();
            }
        
            return redirect()->back();
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product= Product::find($id);
        
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();

        return redirect()->back();
    }
}
