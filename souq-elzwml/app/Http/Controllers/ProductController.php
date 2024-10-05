<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subCategories = SubCategory::all();
        return view('user.products.create', compact(['subCategories']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:50',
            'description' => 'nullable|max:255',
            'summary' => 'nullable|max:255',
            'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'images.*' => 'image|mimes:jpeg,png,jpg,bmp,webp|max:2048',
            'category_id' => 'required|integer|exists:sub_categories,id',
        ]);
        
        
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $image_name = Str::uuid() . '.' . $image->extension();
                $image->storeAs('public/product_images', $image_name);
                $images[] = $image_name;
            }
        }
        
        
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'summary' => $request->summary,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);
        
        $product_id = $product->id;
        
        foreach ($images as $image) {
            ProductImage::create([
                'product_id' => $product_id,
                'image_name' => $image
            ]);
        }
        
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        $subCategories = SubCategory::all();
        $productImages = ProductImage::where('product_id', $id)->get();
        return view('user.products.show', compact(['product','subCategories', 'productImages']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
