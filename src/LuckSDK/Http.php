<?php
/**
 * Http.php.
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
namespace Tianyong90\LuckSDK;

use Tianyong90\LuckSDK\Utils\Http as HttpClient;
use Tianyong90\LuckSDK\Utils\JSON;

/**
 * Http.
 */
class Http extends HttpClient
{
    /**
     * json请求
     *
     * @var bool
     */
    protected $json = false;

    /**
     * constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 发起一个HTTP/HTTPS的请求
     *
     * @param string $url     接口的URL
     * @param string $method  请求类型   GET | POST
     * @param array  $params  接口参数
     * @param array  $options 其它选项
     *
     * @return array | boolean
     */
    public function request($url, $method = self::GET, $params = array(), $options = array())
    {
        $method = strtoupper($method);

        if ($this->json) {
            $options['json'] = true;
        }

        $response = parent::request($url, $method, $params, $options);

        $this->json = false;
        if (empty($response['data'])) {
            throw new Exception('服务器无响应', 50006);
        }

        // 非 JSON 数据
        if (!preg_match('/^[\[\{]\"/', $response['data'])) {
            return $response['data'];
        }

        $contents = json_decode($response['data'], true);

        if (JSON_ERROR_NONE !== json_last_error()) {
            return $response['data'];
        }

        if (isset($contents['status']) && 1 !== $contents['status']) {
            if (empty($contents['msg'])) {
                $contents['msg'] = 'Unknown';
            }

            throw new Exception($contents['msg'], $contents['msg']);
        }

        return $contents;
    }

    /**
     * 魔术调用.
     *
     * @param string $method
     * @param array  $args
     *
     * @return mixed
     */
    public function __call($method, $args)
    {
        if (stripos($method, 'json') === 0) {
            $method = strtolower(substr($method, 4));
            $this->json = true;
        }
        $result = call_user_func_array(array($this, $method), $args);

        return $result;
    }
}
