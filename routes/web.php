<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

use App\Http\Controllers\CartController;

use App\Http\Controllers\SiteController;

use App\Http\Controllers\GoodController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\InformationController;

use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\super_admin\BannerController;

use App\Http\Controllers\super_admin\ItemController;

use App\Http\Controllers\super_admin\CategoryController;

use App\Http\Controllers\super_admin\CrudController;

use App\Http\Controllers\super_admin\Stock\StockController;

use App\Http\Controllers\super_admin\Partner\PartnerController;

use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [SiteController::class, 'index']);

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::resource('product', ProductController::class);

Route::get('/add_cart/{product_id}/{product_name}/{product_price}', [CartController::class, 'addToCart']);

Route::get('/user_login', function () {
    return view('user_login');
});

Route::get('/user_logout', function () {
    Session::forget('user');
    return redirect('user_login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post("add_to_cart",[ProductController::class,'addToCart']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::post("/user_login",[UserController::class,'login']);

Route::post("/user_registration",[UserController::class,'register']);

Route::get("cartlist",[ProductController::class,'cartList']); 

Route::get("removecart/{id}",[ProductController::class,'removeCart']); 

Route::get("productdetails/{id}",[ProductController::class,'productDetails']); 

Route::get("ordernow",[ProductController::class,'orderNow']);

Route::post("orderplace",[ProductController::class,'orderplace']);

Route::get("myorders",[ProductController::class,'myOrders']);

Route::group(['middleware' => ['auth', 'admin']], function() {


    ///Route::get('/item_edit/id', [CrudController::class, 'edit']);

    Route::get('/super_admin', [AdminController::class, 'index']);
    
    Route::resource('banner', BannerController::class);

    Route::resource('stock', StockController::class);

    Route::resource('good',GoodController::class);

    Route::resource('item', ItemController::class);

    Route::resource('partner',PartnerController::class);

   ///Route::post('item/{id}', 'ItemController@update')->name('item.update');
   Route::get('/information', [InformationController::class, 'info']);

   Route::get('/edit_info/{id}', [InformationController::class, 'edit_info']);
    
   Route::resource('category', CategoryController::class);

   Route::post('/update_info/{id}', [InformationController::class, 'update']);


});

