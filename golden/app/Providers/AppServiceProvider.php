<?php

namespace App\Providers;

use View;
use App\Providers;
use App\Category;
use App\Supplier;
use App\Purchase;
use App\Product;
use App\Sale;
use App\User;
use App\Bar;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Setting;
use Auth;
use DB;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        View::composer('*', function($view)
        {
            $view->with('setting', Setting::find(1));
            $view->with('bars', Bar::where('deleted_at', NULL)->get());
            $view->with('categories', Category::where('deleted_at', NULL)->get());
            $view->with('suppliers', Supplier::where('deleted_at', NULL)->get());
            $view->with('product8', Product::where('deleted_at', NULL)->take(8)->get());
            $view->with('allproducts', Product::where('deleted_at', NULL)->get());
            $view->with('theproducts', Product::where('deleted_at', NULL)->paginate(4));
            $view->with('countproduct', Product::where('deleted_at', NULL)->count());
            $view->with('countpurchase', Purchase::where('deleted_at', NULL)->count());
            $view->with('countsale', Sale::where('deleted_at', NULL)->count());
            $view->with('theusers', User::where('deleted_at', NULL)->get());
            $view->with('countsupplier', Supplier::where('deleted_at', NULL)->count());

            if (Auth::guard('web')->check()) {
                $id = Auth::user()->id;
                $view->with('barr', Bar::where('deleted_at', NULL)->where('current_manager', $id)->first());
            }
        });
    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
