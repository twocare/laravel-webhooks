<?php

return [

	/**
	 * Webhooks registry
	 *
	 * @example
	 * 		[
	 * 			'example-webhook-name' => [
	 *    			'handler' => 'Namespace\\Class\\Name',
	 *       		'key' => 'SOME_GENERATED_KEY'
	 *			],
	 *			'example-webhook-nokey' => 'Namespace\\Class\\Name',
	 *			'example-webhook-other-name' => [
	 *				'name' => 'this-is-the-name',
	 *    			'handler' => 'Namespace\\Class\\Name',
	 *       		'key' => env('SOME_GENERATED_KEY', '12345678')
	 *			],
	 * 		]
	 */
	'registry' => [

	],

	'register_routes' => true,

	'route_prefix' => 'webhook',

	/*
	|--------------------------------------------------------------------------
	| Application Debug Mode
	|--------------------------------------------------------------------------
	|
	| When your application is in debug mode, detailed error messages with
	| stack traces will be shown on every error that occurs within your
	| application. If disabled, a simple generic error page is shown.
	|
	*/

	'debug' => env('APP_DEBUG', false),

];
