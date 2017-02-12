<?php

namespace Craftware\Webhooks\Handler;

use Craftware\Webhooks\Webhook;
use Craftware\Webhooks\Handler\WebhooksHandler;

class NullHandler extends WeebhookHandler
{
    /**
     * Create the webhook listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the received webhook.
     *
     * @param  ReceivedWebhook $webhook
     * @return void
     */
    public function handle(Weebhook $webhook)
    {
        // Access the webhook using $webhook...
    }
}
