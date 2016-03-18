<?php
/**
 * LuckHelper.php.
 *
 * Part of Tianyong90\LuckSDK.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author    tianyong90 <412039588@qq.com>
 * @copyright 2016 tianyong90 <412039588@qq.com>
 *
 * @link      https://github.com/tianyong90
 */
namespace Tianyong90\LuckSDK\Foundation;

use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Symfony\Component\HttpFoundation\Request;
use Tianyong90\LuckSDK\Core\Http;
use Tianyong90\LuckSDK\Encryption\Encryptor;
use Tianyong90\LuckSDK\Support\Collection;
use Tianyong90\LuckSDK\Support\Log;

/**
 * 调用纳客接口的帮助类.
 */
class Sender
{
    /**
     * @var Encryptor
     */
    private $encryptor;

    /**
     * @var array
     */
    private $dataToSend;

    private $http;

    /**
     * Constructor.
     *
     * @param array $config
     */
    public function __construct(Encryptor $encryptor, Http $http)
    {
        $this->encryptor = $encryptor;

        $this->http = $http;
    }

    /**
     * set encryptor.
     *
     * @param Encryptor $encryptor
     */
    public function setEncryptor(Encryptor $encryptor)
    {
        $this->encryptor = $encryptor;
    }

    /**
     * get encryptor.
     *
     * @return Encryptor
     */
    public function getEncryptor()
    {
        return $this->encryptor;
    }

    /**
     * set data to send.
     *
     * @param array $data
     */
    public function setData(array $data)
    {
        $this->dataToSend = $data;
    }

    /**
     * get data to send.
     *
     * @return array
     */
    public function getData()
    {
        return $this->dataToSend;
    }

    public function send()
    {
//        $this->http->post();
    }
}