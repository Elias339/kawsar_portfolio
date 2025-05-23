<?php

namespace App\Providers;

use App\Models\Slider;
use App\Models\Tool;
use App\Models\Websetting;
use Illuminate\Support\ServiceProvider;

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
//        View()->composer('front_end.content.home.index', function ($view) {
//            $tools = Tool::where('status','Active')->get();
//            $setting = Websetting::first();
//            $sliders = Slider::where('status','1')->get();
//
//            $view->with([
//                'tools'=>$tools,
//                'setting'=>$setting,
//                'sliders'=>$sliders,
//            ]);
//        });


    }
}
