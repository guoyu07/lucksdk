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

use Pimple\Container;
use Tianyong90\Support\Log;

/**
 * 调用纳客接口的帮助类.
 */
class Application extends Container
{
    /**
     * Constructor.
     *
     * @param array $config
     */
    public function __construct()
    {
        parent::__construct();

//        $this['config'] = function () use ($config) {
//            return new Config($config);
//        };

//        if ($this['config']['debug']) {
//            error_reporting(E_ALL);
//        }
//
//
//        Log::debug('当前配置：', $config);
    }
}
