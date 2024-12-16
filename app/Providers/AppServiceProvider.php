<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Schema;

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
        //menu için
        if (Schema::hasTable('products') && Schema::hasTable('categories')) {
            $products = Product::with('categories')->get();
            $categories = Category::with('parents')->get();
        
            $menuItems = [
                'products' => $products,
                'categories' => $categories,
            ];
        
            View::share('menuItems', $menuItems);
        }
    }
}
