<?php

namespace Craftware\Webhooks;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Craftware\Webhooks\Console\WebhookHandlerMakeCommand;

class WebhooksServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->publishConfig();
	}

	/**
	 * [register description]
	 *
	 * @return [type] [description]
	 */
	public function register()
	{
		$this->mergeConfigFrom(
			__DIR__.'/../config/webhooks.php', 'webhooks'
		);

		$this->registerConsoleCommands();
		$this->registerRoutes();
	}

	/**
	 * Get config value
	 *
	 * @param  string $name
	 * @return mixed
	 */
	protected function getConfig($name)
	{
		return $this->app['config']->get($name);
	}

	/**
	 * Publishes config files
	 *
	 * @return void
	 */
	protected function publishConfig()
	{
		$this->publishes([
			__DIR__.'/../config/webhooks.php' => config_path('webhooks.php'),
		], 'config');
	}

	/**
	 * Add package commands to artisan console.
	 *
	 * @return void
	 */
	protected function registerConsoleCommands()
	{
		$this->commands([
			WebhookHandlerMakeCommand::class,
		]);
	}

	/**
	 * Register the webhook route
	 *
	 * @return void
	 */
	protected function registerRoutes()
	{
		if ($this->getConfig('webhooks.register_routes')) {

			Route::post(
				'/' . $this->getConfig('webhooks.route_prefix') . '/{name}/{key?}',
				'Craftware\Webhooks\Http\WebhooksController@store'
			);
		}
	}
}
