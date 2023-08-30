<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Categories');
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
            'name' => 'required|min:3',
            'image' => 'required'
        ]);
        if($request->hasFile('image')){
            $image = $request->file('image')->store('categories');
            Categories::create([
                'name' => $request->name,
                'image' => $image,
            ]);
            return redirect()->back()->with('message','Category has been created');
        }
        return redirect()->back()->with('message','Categori fail created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $category)
    {
       return Inertia::render('Admin/EditCategory',[
        'category' => $category
       ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categories $category)
    {
        $image = $category->image;
        $request->validate([
            'name' => 'required|min:3'
        ]);
        if($request->hasFile('image')){
            Storage::delete($category->image);
            $image = $request->file('image')->store('categories');
        }
        $category->update([
            'name' => $request->name,
            'image' => $image,
        ]);
        return redirect('admin/categories')->with('message','Category succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $category)
    {
        Storage::delete($category->image);
        $category->delete();

        return redirect()->back()->with('message', 'Category has been deleted');
    }
}
