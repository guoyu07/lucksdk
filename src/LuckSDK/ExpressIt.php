<?php
/**
 * @Author: tianyong90
 */

namespace Tianyong90\LuckSDK;

/**
 * 快递查询类
 */
class LuckSDK
{
    /**
     * 快递公司名
     *
     * @var array
     */
    private $expressCompanyName = array();

    function __construct()
    {
        $this->expressCompanyName = $this->getCompanyName();
    }

}