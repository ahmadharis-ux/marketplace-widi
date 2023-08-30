<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required:min:3',
            'categories_id' => 'required',
            'image' => 'required',
            'price' => 'required',
        ]);
        if($request->hasFile('image')){
            $image = $request->file('image')->store('product');
            Products::create([
                'name' => $request->name,
                'categories_id' => $request->categories_id,
                'image' => $image,
                'price' => $request->price,
            ]);
            return redirect()->back()->with('message','Product has been created');
        }
        return redirect()->back()->with('message','Product fail created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $product)
    {
        return Inertia::render('Admin/EditProduct',[
            'product' => $product,
            'categories' => Categories::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $product)
    {
        $image = $product->image;
        $request->validate([
            'name' => 'required|min:3',
            'categories_id' => 'required',
            'price' => 'required',
        ]);
        if($request->hasFile('image')){
            Storage::delete($product->image);
            $image = $request->file('image')->store('product');
        }
        $product->update([
            'name' => $request->name,
            'categories_id' => $request->categories_id,
            'price' => $request->price,
            'image' => $image,
        ]);
        return redirect('admin/products')->with('message','Product succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $product)
    {
        Storage::delete($product->image);
        $product->delete();

        return redirect()->back()->with('message', 'Product has been deleted');
    }
}
