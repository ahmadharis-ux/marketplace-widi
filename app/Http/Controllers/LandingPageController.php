<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Categories;
use App\Models\Contact;
use App\Models\Hero;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Can;
use Inertia\Inertia;

class LandingPageController extends Controller
{
    function index(){
        return Inertia::render('Customer/Index',[
            'categories' => Categories::latest()->take(3)->get(),
            'carts' => Cart::with('product')->get(),
            'heroes' => Hero::all(),
            'contact' => Contact::all(),
            'auth' => Auth::user(),
        ]);
    }
    function indexProducts(){
        // dd(request('search'));
        return Inertia::render('Customer/Products/Index',[
            'products' => Products::latest()->get(),
            'categories' => Categories::all(),
            'carts' => Cart::with('product')->get(),
        ]);
    }
    function showProduct($id){
        return Inertia::render('Customer/Products/Product',[
            'product' => Products::findOrFail($id),
            'carts' => Cart::with('product')->latest()->get(),

        ]);
    }
    function addToCart(Request $request){

        $validasiData = $request->validate([
            'product_id' => 'required',
            'qty' => 'required',
        ]);
        // dd($validasiData);
        Cart::create($validasiData);
        return redirect()->back()->with('message','Yeay kamu telah menaruhnya ke keranjang');
    }
    function deleteInCart($id){
        $cart = Cart::find($id);
        $cart->delete();

        return redirect()->back();
    }
    
    function addQtyInCart(Request $request, $id){
            // Temukan objek Cart berdasarkan ID
            $cart = Cart::findOrFail($id);
            // Tingkatkan qty
            $cart->qty += 1;
            // Simpan perubahan ke dalam database
            $cart->save();

            return redirect()->back();
    }
    function removeQtyInCart(Request $request, $id){
            // Temukan objek Cart berdasarkan ID
            $cart = Cart::findOrFail($id);
            // Tingkatkan qty
            $cart->qty -= 1;
            // Simpan perubahan ke dalam database
            $cart->save();

            return redirect()->back();
    }

    
}
