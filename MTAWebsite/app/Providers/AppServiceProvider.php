<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
// use App\Models\Menu;
// use App\Models\Category;
// use App\Models\Customer;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

    }        // $menu = Menu::all()->toArray();
        // $menu = showCategories($menu);
        // View::share('menu',$menu);
        // $category = Category::all()->toArray();
        // $category = showCategories($category);
        // View::share('category',$category);
        // $customer = Customer::all();
        // View::share('customer',$customer);
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
