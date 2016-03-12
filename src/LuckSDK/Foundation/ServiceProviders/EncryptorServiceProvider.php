<?php

namespace Tianyong90\LuckSDK\Foundation\ServiceProviders;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Tianyong90\LuckSDK\Encryption\Encryptor;

/**
 * Class EncryptorServiceProvider
 *
 * @package Tianyong90\LuckSDK\Foundation\ServiceProviders
 */
class EncryptorServiceProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     */
    public function register(Container $pimple)
    {
        $pimple['encryptor'] = function ($pimple) {
            return new Encryptor($pimple['config']['key']);
        };
    }
}