<?php

namespace Craftware\Webhooks\Handler;

use Craftware\Webhooks\Webhook;
use Illuminate\Support\Facades\Log;

abstract class WebhookHandler
{
	/**
	 * Run the webhook throug the handler
	 *
	 * @param  Webhook $webhook
	 * @return mixed
	 */
	public function run(Webhook $webhook)
	{
		if (config('webhooks.debug'))
			$this->logRequest($webhook);

		return $this->handle($webhook);
	}

	/**
	 * Handle the received webhook.
	 *
	 * @param  ReceivedWebhook $webhook
	 * @return void
	 */
	abstract public function handle(Webhook $webhook);

	/**
	 * Return success
	 *
	 * @return Response
	 */
	protected function success()
	{

	}

	/**
	 * Return fail
	 *
	 * @return Response
	 */
	protected function fail()
	{

	}

	/**
	 * Log the request for debug purpose
	 *
	 * @param  Webhook $webhook
	 * @return void
	 */
	protected function logRequest(Webhook $webhook)
	{
		dd($webhook->getName());
		Log::debug("A call for the {$webhook->getName()} webhook was received", $webhook->toArray());
	}
}
