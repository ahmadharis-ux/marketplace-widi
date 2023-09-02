<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\SigninController;
use App\Models\Categories;
use App\Models\Contact;
use App\Models\Hero;
use App\Models\Products;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Symfony\Component\CssSelector\Node\FunctionNode;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/')->group(function(){
    Route::get('/', [LandingPageController::class,'index'])->name('index');
    Route::get('/cust/products', [LandingPageController::class,'indexProducts'])->name('productsForCustomer');
    Route::get('/cust/product/{id}', [LandingPageController::class,'showProduct'])->name('showProduct');
    Route::post('/addtochart',[LandingPageController::class,'addToCart'])->name('addToCart');
    Route::get('/newQty/{id}',[LandingPageController::class,'addQtyInCart'])->name('newqty');
    Route::get('/removeQty/{id}',[LandingPageController::class,'removeQtyInCart'])->name('removeqty');
    Route::get('/deleteInCart/{id}', [LandingPageController::class,'deleteInCart'])->name('deleteInChart');
});

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });
Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin', function(){
        return Inertia::render('Admin/Welcome',[
            'products' => Products::all(),
            'heroes' => Hero::all(),
            'contact' => Contact::where('id',1)->first()
        ]);
    })->name('admin');

    Route::get('/admin/products', function(){
        return Inertia::render('Admin/Products',[
            'products' => Products::with('category')->get(),
            'categories' => Categories::all(),
        ]);
    })->name('admin.products');
    
    Route::get('/admin/categories', function(){
        return Inertia::render('Admin/Categories',[
            'categories' => Categories::with('product')->get(),
            // 'categories' => Categories::all()
        ]);
    })->name('admin.categories');
    Route::resource('products', ProductsController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('heroes', HeroController::class);
    Route::resource('contact', ContactController::class);

    Route::get('admin/profile', [AdminController::class,'profile'])->name('profile.admin');
});


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/signin', [SigninController::class,'index'])->middleware('guest');
Route::get('/signup', [SigninController::class,'signup'])->middleware('guest')->name('signup');
Route::post('/daftar', [SigninController::class,'daftar'])->middleware('guest')->name('daftar');

Route::post('/signin', [SigninController::class, 'signin'])->middleware('guest')->name('signin');
Route::get('/logout', [SigninController::class, 'logout'])->name('logout');

// require __DIR__.'/auth.php';
