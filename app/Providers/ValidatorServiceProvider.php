<?php

namespace App\Providers;
use App\Services\Validator;
use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		// Register the extended validator as the new validator
		\Validator::resolver(function($translator, $data, $rules, $messages)
		{
			return new Validator($translator, $data, $rules, $messages);
		});
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
