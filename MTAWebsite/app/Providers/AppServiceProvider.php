<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Menu;
use App\Models\CatePost;
use App\Models\Faculty;
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
        $menu = Menu::orderBy('index')->get()->toArray();
        $menu = showCategories($menu);
        View::share('menu',$menu);
        $category = CatePost::all();
        View::share('category',$category);
        $faculty = Faculty::all();
        View::share('faculty',$faculty);
        // $customer = Customer::all();
        // View::share('customer',$customer);

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
