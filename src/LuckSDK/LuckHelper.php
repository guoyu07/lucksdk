<?php
/**
 * LuckHelper.php
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

/**
 * 调用纳客接口的帮助类
 */
class LuckHelper
{
    const LUCK_VERSION_CLISSIC = 1;  //经典版
    const LUCK_VERSION_POPULAR = 2;  //商盟大众版
    const LUCK_VERSION_ULTIMATE = 3;  //商盟旗舰版
    const LUCK_VERSION_ENTERPRISE = 4;  //企业版

    /**
     * 接口URL
     *
     * @var string
     */
    private $interfaceUrl;

    /**
     * 企业代码
     *
     * @var string
     */
    private $companyCode;

    /**
     * 店铺号，仅商盟旗舰版需要
     *
     * @var string
     */
    private $shopId;

    /**
     * 接口密钥
     *
     * @var string
     */
    private $interfaceKey;

    /**
     * 对接的纳客系统版本
     *
     * @var string
     */
    private $luckVersion;

    /**
     * 接口返回结果
     *
     * @var array
     */
    public $response = array();

    /**
     * 接口调用是否成功
     *
     * @var bool
     */
    public $isSuccess = false;

    private $encrypter;

    public $option = array();

    function __construct($option)
    {
        //公众号设置的纳客接口地址
        $this->interfaceUrl = $option['luck_url'];

        //公众号设置的纳客接口密钥
        $this->interfaceKey = $option['luck_key'];

        //获取设置的纳客接口版本
        $this->luckVersion = $option['luck_version'];
        //企业代码
        $this->companyCode = $option['company_code'];

        if ($this->luckVersion == self::LUCK_VERSION_ENTERPRISE && empty($this->companyCode)) {
            throw new Exception('what the fuck');
        }

        //店铺号，针对商盟旗舰版
        $this->shopId = $option['shop_id'];
        if ($this->luckVersion == self::LUCK_VERSION_ULTIMATE && empty($this->shopId)) {
            $this->errorCode = 'WX4';
        }

        //加解密器
        $this->encrypter = new Encrypter($option['luck_key']);

    }

    /**
     * 调用纳客接口
     *
     * @param string $_method 接口方法名
     */
    public function callnake($_method, $data = array())
    {
        //实际请求地址
        $url = trim($this->interfaceUrl, '/ \/') . "/Interface/GeneralInterfaceHandler.ashx";

        //请求方法名加入到参数中
        $data['do'] = $_method;

        //如果是商盟旗舰版，则参数中加入店铺ID
        if ($this->luckVersion === self::LUCK_VERSION_ULTIMATE) {
            $data['ShopID'] = $this->shopId;
        }


        //数据
        foreach ($data as $key => $value) {
            $data[$key] = $this->encrypter->encrypt($value);
        }

        //企业代码不加密
        $data['CompCode'] = $this->companyCode;

        $ch = curl_init();
        // 参数数组
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        $curlResponse = curl_exec($ch);
        curl_close($ch);

        if ($curlResponse) {
            //响应JSON解析为数组
            $arr = json_decode($curlResponse, true);
            $this->response = $arr;
            $this->isSuccess = $arr['status'] == 1 ? true : false;
            $this->errorCode = $arr['msg'];
            //先在收录是错码码中查找提示信息，没有则直接用返回的msg
            if ($arr['status'] !== 1) {
                throw new Exception($arr['msg'], $arr['msg']);
            }
            return $arr;
        } else {
            throw new Exception('请求接口数据失败', 50005);
        }
    }
}
