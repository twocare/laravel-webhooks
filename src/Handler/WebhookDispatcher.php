<?php

namespace Craftware\Webhooks\Handler;

use App;
use Exception;
use Illuminate\Http\Request;
use Craftware\Webhooks\Webhook;

class WebhookDispatcher
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $key;

    /**
     * @var array
     */
    protected $config;

    /**
     * Constructor.
     *
     * @param Request $request
     * @param string         $name
     * @param boolean        $key
     *
     * @return self
     */
    public function __construct(Request $request, $name, $key = false)
    {
        $this->request = $request;
        $this->name = $name;
        $this->key = $key;

        return $this->setup();
    }

    /**
     * Setup the dispatcher
     *
     * @return self
     */
    protected function setup()
    {
        $this->getConfig($this->name);

        if ($this->config->key !== $this->key)
            throw new Exception("You don't have permission to be here!");

        return $this;
    }

    /**
     * Get the webhook configuration
     *
     * @param  string $name
     * @return array
     */
    protected function getConfig($name)
    {
        $registry = config('webhooks.registry');

        if ( ! isset($registry[$name]))
            throw new Exception("Weebhook `$name` not registered.");

        $webhookConfig = $registry[$name];

        if ( ! is_array($webhookConfig))
            $webhookConfig = ['handler' => $webhookConfig];

        if ( ! isset($webhookConfig['key']))
            $webhookConfig['key'] = false;

        return $this->config = (object) $webhookConfig;
    }

    /**
     * Run the webhook through it's handler
     *
     * @return [type]
     */
    public function run()
    {
        $handler = App::make($this->config->handler);

        return $handler->run(new Webhook($this->name, $this->request));
    }
}
