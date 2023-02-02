<?php 

namespace Rockitworks\Documents;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Rockitworks\Invoice\InvoiceGenerator;

class ServiceProvider extends BaseServiceProvider {


    protected $defer = false;

	public $configPath =  __DIR__ . '/../config/invoice.php';

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
    {

        // Register a class in the service container
        $this->app->bind('rockitworks.invoice', function ($app) {
            return new InvoiceGenerator();
        });

        $this->mergeConfigFrom(__DIR__ . '/../config/invoice.php', 'invoice');
    }

    public function boot()
    {
        $this->publishes([
        	__DIR__ . '/../config/invoice.php' => config_path('invoice.php'),
        	__DIR__ . '/../resources/views' => resource_path('views/vendor/rockitworks/invoice'),
        ]);

        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadViewsFrom( __DIR__ . '/resources/views', 'rockitworks-invoice');


    	// $this->app->bind('rockitworks.invoice', function($app) {
    	// 	return new InvoiceGenerator();
     //    });

    }
}