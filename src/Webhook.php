<?php

namespace Craftware\Webhooks;

use Illuminate\Http\Request;

class Webhook
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var Request
     */
    protected $request;

    public function __construct($name, Request $request)
    {
        $this->name = $name;
        $this->request = $request;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getHeaders()
    {
        return $this->request->header();
    }

    public function getPayload()
    {
        return $this->request->all();
    }

    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'headers' => $this->getHeaders(),
            'payload' => $this->getPayload()
        ];
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int  $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }
}
