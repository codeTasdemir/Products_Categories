<?php

use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\frontend\CategoryController as FrontCategoryController;
use App\Http\Controllers\frontend\ProductController as FrontProductController;

use Illuminate\Support\Facades\Route;


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

//küçük bir admin paneli gibi olan kısım rotaları
Route::name('backend.')->group(function () {
    Route::name('product.')->controller(ProductController::class)->group(function () {
        Route::get('admin/product','index')->name('index');
        Route::get('admin/product/create/','create')->name('create');
        Route::post('admin/product/store/','store')->name('store');
        Route::get('admin/product/edit/{id}','edit')->name('edit'); 
        Route::post('admin/product/update/{id}','update')->name('update');
        Route::post('admin/product/delete/{id}','destroy')->name('delete');
    
    
    });
    
    Route::name('category.')->controller(CategoryController::class)->group(function () {
        Route::get('admin/category','index')->name('index'); 
        Route::get('admin/category/create/','create')->name('create');
        Route::post('admin/category/store/','store')->name('store');
        Route::get('admin/category/edit/{id}','edit')->name('edit'); 
        Route::post('admin/category/update/{id}','update')->name('update');
        Route::post('admin/category/delete/{id}','destroy')->name('delete');
    });    
});

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::name('frontend.')->group(function () {

    Route::name('product.')->controller(FrontProductController::class)->group(function () {
        Route::get('products/','index')->name('index'); 
        Route::get('/products-all','getAllProducts')->name('getAllProducts');
        Route::get('/products-by-category','getProductsByCategory')->name('category.order');
        Route::get('/{slug}','detail')->name('detail'); 

        Route::get('product/search','search')->name('search');

    });
    //kategoriler için ekstra frontend de bir şeyler yapmadım
    //menü de alt kategorileri eklersek görebiliriz
    
});


