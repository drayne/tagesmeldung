<?php
namespace App\Providers;

use App\Utilities\AdminNotify\AdminNotify;
use App\Utilities\AdminNotify\SlackAdminNotify;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class AdminNotifyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('adminNotify', function ($app) {
            return new SlackAdminNotify(new Client(), [
                'webhook_url' => env('SLACK_WEBHOOK_URL')
            ]);
        });
    }
}