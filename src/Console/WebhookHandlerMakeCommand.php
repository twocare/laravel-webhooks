<?php

namespace Craftware\Webhooks\Console;

use Illuminate\Console\GeneratorCommand;

class WebhookHandlerMakeCommand extends GeneratorCommand
{
	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'make:webhook-handler';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new webhook handler class';

	/**
	 * The type of class being generated.
	 *
	 * @var string
	 */
	protected $type = 'WebhookHandler';

	/**
	 * Get the stub file for the generator.
	 *
	 * @return string
	 */
	protected function getStub()
	{
	    return __DIR__ . '/../../stubs/webhook-handler.stub';
	}
}
