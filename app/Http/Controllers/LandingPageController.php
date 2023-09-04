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
    //simpanan
    function index(){
        if (auth()->check()) {
            $auth = auth()->user();
            return Inertia::render('Customer/Index',[
                'categories' => Categories::latest()->take(3)->get(),
                'carts' => Cart::with('product')->where('author', $auth->id)->get(),
                'heroes' => Hero::all(),
                'contact' => Contact::all(),
                'auth' => $auth,
            ]);
        } else {
            $auth = auth()->user();
            return Inertia::render('Customer/Index',[
                'categories' => Categories::latest()->take(3)->get(),
                'carts' => Cart::with('product')->where('author', $auth)->get(),
                'heroes' => Hero::all(),
                'contact' => Contact::all(),
                'auth' => $auth,
            ]);
        }
    }
    function indexProducts(){
        if(auth()->check()){
            $auth = auth()->user();
            return Inertia::render('Customer/Products/Index',[
                'products' => Products::latest()->get(),
                'categories' => Categories::all(),
                'carts' => Cart::with('product')->where('author',$auth->id)->get(),
                'auth' => auth()->user(),
            ]);
        }else{
            $auth = auth()->user();
            return Inertia::render('Customer/Products/Index',[
                'products' => Products::latest()->get(),
                'categories' => Categories::all(),
                'carts' => Cart::with('product')->where('author',$auth)->get(),
                'auth' => auth()->user(),
            ]); 
        }
    }
    function showProduct($id){
        if(auth()->check()){
            $auth = auth()->user();
            return Inertia::render('Customer/Products/Product',[
                'product' => Products::findOrFail($id),
                'carts' => Cart::with('product')->where('author',$auth->id)->get(),
                'auth' => auth()->user(),
            ]);
        }else{
            $auth = auth()->user();
            return Inertia::render('Customer/Products/Product',[
                'product' => Products::findOrFail($id),
                'carts' => Cart::with('product')->where('author',$auth)->get(),
                'auth' => '0',
            ]);
        }
    }
    function addToCart(Request $request){
        if(auth()->check()){
            $validasiData = $request->validate([
                'product_id' => 'required',
                'qty' => 'required',
                'author' => 'required'
            ]);
            // dd($validasiData);
            Cart::create($validasiData);
            return redirect()->back()->with('message','Yeay kamu telah menaruhnya ke keranjang');
        }else{
            return redirect('/signin');
        }
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
