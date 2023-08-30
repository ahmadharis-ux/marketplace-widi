<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class HeroController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Hero $hero)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hero $hero)
    {
        return Inertia::render('Admin/EditHero',[
            'hero' => $hero
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hero $hero)
    {
        $image = $hero->image;
        $request->validate([
            'label' => 'required|min:3',
            'deskripsi' => 'required',
            'slide' => 'required',
        ]);
        if($request->hasFile('image')){
            Storage::delete($hero->image);
            $image = $request->file('image')->store('hero');
        }
        $hero->update([
            'label' => $request->label,
            'deskripsi' => $request->deskripsi,
            'slide' => $request->slide,
            'image' => $image,
        ]);
        return redirect('admin')->with('message','Hero succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hero $hero)
    {
        //
    }
}
