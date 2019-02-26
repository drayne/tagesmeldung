<?php

namespace App\Providers;

use App\Exports\TagesmeldungExport;
use App\Overriders\OracleSchemaManagerOverride;
use Doctrine\DBAL\Schema\OracleSchemaManager;
use Illuminate\Support\ServiceProvider;

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
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('mailgun.client', function() {
            return \Http\Adapter\Guzzle6\Client::createWithConfig([
                // your Guzzle6 configuration
            ]);
        });

        $this->app->bind(OracleSchemaManager::class, OracleSchemaManagerOverride::class);

        //kada se poziva PolisaRepository ustv ce instancirati DoctrinePolisaRepository->DoctrineBaseRepository->EntityRepository sa zadatim entitetom u konstruktoru
        //posto EntityRepository u __construct ocekuje EntityManager em i mapper klasu koju ce koristiti, prosledjujemo ih ovde
        //ovo je kao dependency injection, preko service managera
        $this->app->bind(\App\Models\Polisa\PolisaRepository::class, function($app) {
            return new \App\Repositories\Polisa\DoctrinePolisaRepository(
                $app['em'],
                $app['em']->getClassMetaData(\App\Models\Polisa\Polisa::class)
            );
        });

        $this->app->bind(\App\Models\EmailQueue\EmailQueueRepository::class, function($app) {
            return new \App\Repositories\EmailQueue\DoctrineEmailQueueRepository(
                $app['em'],
                $app['em']->getClassMetaData(\App\Models\EmailQueue\EmailQueue::class)
            );
        });

        $this->app->bind(\App\Models\Prijstet\PrijstetRepository::class, function($app) {
            return new \App\Repositories\Prijstet\DoctrinePrijstetRepository(
                $app['em'],
                $app['em']->getClassMetaData(\App\Models\Prijstet\Prijstet::class)
            );
        });

        $this->app->bind(\App\Models\Prijstet\PrijstetIznosSumaRepository::class, function($app) {
            return new \App\Repositories\Prijstet\DoctrinePrijstetIznosSumaRepository(
                $app['em'],
                $app['em']->getClassMetaData(\App\Models\Prijstet\PrijstetIznosSuma::class)
            );
        });

        $this->app->bind(\App\Models\Polisa\PolisaOstaleSumaRepository::class, function($app) {
            return new \App\Repositories\Polisa\DoctrinePolisaOstaleSumaRepository(
                $app['em'],
                $app['em']->getClassMetaData(\App\Models\Polisa\PolisaOstaleSuma::class)
            );
        });

        $this->app->bind(\App\Models\Tagesmeldung\TagesmeldungRepository::class, function($app) {
            return new \App\Repositories\Tagesmeldung\DoctrineTagesmeldungRepository(
                $app['em'],
                $app['em']->getClassMetaData(\App\Models\Tagesmeldung\Tagesmeldung::class)
            );
        });

        $this->app->bind(\App\Models\Tagesmeldung\TagesmeldungMonthRepository::class, function($app) {
            return new \App\Repositories\Tagesmeldung\DoctrineTagesmeldungMonthRepository(
                $app['em'],
                $app['em']->getClassMetaData(\App\Models\Tagesmeldung\TagesmeldungMonth::class)
            );
        });

    }
}
