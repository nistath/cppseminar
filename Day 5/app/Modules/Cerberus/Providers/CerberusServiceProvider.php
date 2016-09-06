<?php
namespace App\Modules\Cerberus\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Support\ServiceProvider;

class CerberusServiceProvider extends ServiceProvider
{
	/**
	 * Register the Cerberus module service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a convenient place to register your modules
		// services in the IoC container. If you wish, you may make additional
		// methods or service providers to keep the code more focused and granular.
		App::register('App\Modules\Cerberus\Providers\RouteServiceProvider');

		$this->registerNamespaces();
	}

	/**
	 * Register the Cerberus module resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
		Lang::addNamespace('cerberus', realpath(__DIR__.'/../Resources/Lang'));

		View::addNamespace('cerberus', base_path('resources/views/vendor/cerberus'));
		View::addNamespace('cerberus', realpath(__DIR__.'/../Resources/Views'));
	}
}
