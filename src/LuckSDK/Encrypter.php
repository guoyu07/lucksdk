<?php
/**
 * Encrypter.php
 *
 * Part of Tianyong90\LuckSDK.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author    tianyong90 <412039588@qq.com>
 * @copyright 2015 tianyong90 <412039588@qq.com>
 * @link      https://github.com/tianyong90
 */

namespace Tianyong90\LuckSDK;

class Encrypter
{
    private $key = '';

    /**
     * Encrypter constructor.
     *
     * @param string $key
     */
    function __construct($key)
    {
        if (empty($key)) {
            throw new Exception('缺少接口密钥');
        }
        $this->key = base64_encode($key);
    }

    /**
     *加密
     *
     * @param string $value
     *
     * @return string
     */
    public function encrypt($value)
    {
        $td = mcrypt_module_open(MCRYPT_3DES, '', MCRYPT_MODE_CBC, '');
        $value = $this->PaddingPKCS7($value);
        $key = base64_decode($this->key);
        mcrypt_generic_init($td, $key, $key);
        $ret = base64_encode(mcrypt_generic($td, $value));
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);
        return $ret;
    }

    /**
     *解密
     *
     * @param string $value
     *
     * @return string>
     */
    public function decrypt($value)
    {
        $td = mcrypt_module_open(MCRYPT_3DES, '', MCRYPT_MODE_CBC, '');
        $key = base64_decode($this->key);
        mcrypt_generic_init($td, $key, $key);
        $ret = trim(mdecrypt_generic($td, base64_decode($value)));
        $ret = $this->UnPaddingPKCS7($ret);
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);
        return $ret;
    }

    private function PaddingPKCS7($data)
    {
        $block_size = mcrypt_get_block_size('tripledes', 'cbc');
        $padding_char = $block_size - (strlen($data) % $block_size);
        $data .= str_repeat(chr($padding_char), $padding_char);
        return $data;
    }

    private function UnPaddingPKCS7($text)
    {
        $pad = ord($text{strlen($text) - 1});
        if ($pad > strlen($text)) {
            return false;
        }
        if (strspn($text, chr($pad), strlen($text) - $pad) != $pad) {
            return false;
        }
        return substr($text, 0, -1 * $pad);
    }
}
