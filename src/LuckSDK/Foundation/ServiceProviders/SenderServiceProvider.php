<?php

namespace Tianyong90\LuckSDK\Foundation\ServiceProviders;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Tianyong90\LuckSDK\Foundation\Sender;

class SenderServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['sender'] = function($pimple) {
            return new Sender();
        };
    }
}