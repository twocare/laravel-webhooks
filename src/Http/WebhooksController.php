<?php

namespace Craftware\Webhooks\Http;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Craftware\Webhooks\Handler\WebhookDispatcher;

class WebhooksController extends Controller
{
    public function store(Request $request, $name, $key = false)
    {
        return (new WebhookDispatcher($request, $name, $key))->run();
    }
}
