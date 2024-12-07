<?php

namespace App\Providers;

use App\Models\Frontend;
use App\Models\GeneralSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Laravel\Fortify\Fortify;
use Jenssegers\Agent\Agent;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Fortify::ignoreRoutes();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {
        $viewShare['basic'] = getGen();
        $general = getGen();

        $sitname = str_word_count($general->sitename);
        $sitnameArr = explode(' ', $general->sitename);
        if ($sitname > 1) {
            $title = "$sitnameArr[0] " . str_replace($sitnameArr[0], '', $general->sitename);
        } else {
            $title = "$general->sitename";
        }

        $notification = getNotify();
        $viewShare['general'] = $general;
        $viewShare['plat'] = getPlatforms();
        $viewShare['notification'] = $notification;
        $viewShare['siteName'] = $title;
        $viewShare['agent'] = new Agent();
        view()->share($viewShare);

        view()->composer('partials.seo', function ($view) {
            $seo = (new Frontend)->getCache();
            $view->with([
                'seo' => $seo ? $seo->data_values : $seo,
            ]);
        });

        if ($general->force_ssl && !$this->app->isLocal()) {
            // URL::forceScheme('https');
        }

        $locale = Session::get('locale', config('app.locale'));
        app()->setLocale($locale);
    }
}
