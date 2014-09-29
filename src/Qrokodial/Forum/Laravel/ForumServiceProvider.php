<?php namespace Qrokodial\Forum\Laravel;

use Illuminate\Support\ServiceProvider;
use Qrokodial\Forum\Contract\ForumContract;

class ForumServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot() {
		$this->package('qrokodial/forum', null, __DIR__ . '/../../..');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register() {
		$this->app->bind(ForumContract::class, function($app) {
			return new Forum;
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides() {
		return [ForumContract::class];
	}
}