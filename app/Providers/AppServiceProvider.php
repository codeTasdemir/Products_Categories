<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $products = Product::with('categories')->get();
        $categories = Category::with('parents')->get();

        $menuItems = [
            'products' => $products,
            'categories' => $categories,
        ];

        View::share('menuItems',$menuItems); 
    }
}
