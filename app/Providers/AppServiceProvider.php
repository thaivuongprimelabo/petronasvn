<?php

namespace App\Providers;
use DB;
use Log;
use App\Config;
use App\Helpers\Utils;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

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
        Schema::defaultStringLength(191);
        
        $appEnv = config('app.env');
        if($appEnv == 'local') {
            // DB::listen(function($query) {
            //     Log::info(
            //         $query->sql,
            //         $query->bindings,
            //         $query->time
            //     );
            // });
        }
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
