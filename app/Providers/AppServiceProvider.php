<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Cart;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View()->composer('*', function ($view) {
            $categories = \Cache::rememberForever('categories', function () {
                return Category::withCount('products', 'parent', 'children')->get();
            });
            $categoriesParent = \Cache::rememberForever('categoriesParent', function () {
                return Category::withCount('products', 'parent', 'children')->categoryParent();
            });
            $categoriesChildren = \Cache::rememberForever('categoriesChildren', function () {
                return Category::withCount('products', 'parent', 'children')->categoryChildren();
            });

            if (Auth::user()) {
                $carts = Cart::where('user_id', Auth::user()->id)->get();
                // $carts = \Cache::rememberForever('carts', function () {
                //     return Cart::where('user_id', Auth::user()->id)->get();
                // });
            }
            $view->with(compact('categories', 'carts', 'categoriesParent', 'categoriesChildren'));
        });
    }
}
