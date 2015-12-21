<?php
/**
 * API.php
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

class API
{
    const API_TEST = 'Test';
    const API_MEM_REG = 'MemReg';  //会员注册
    const API_MEM_UPDATE='MemUpdata';  //修改会员信息
    const API_MEM_DEL='MemDel';  //删除会员信息
    const API_MEM_BIND='MemBind';  //会员绑定

    const API_UPDATE_PASSWORD = 'UpdatePassword';  //修改密码
    const API_UPDATE_STATE = 'UpdateState';  //挂失锁定
    const API_EXTENSION_PASSDATE = 'ExtensionPassDate';  //会员延期

    const API_ADJUST_POINT = 'AdjustPoint';  //调整积分
    const API_RECHARGE_MONEY = 'RechargeMoney';  //会员充值
    const API_GET_MEMINFO = 'GetMemInfo';  //获取会员信息

    const API_GET_DISCOUNTMONEY = 'GetDiscountMoney';  //获取应付金额
    const API_QUICK_CONSUME='QuickConsume';

    const API_ORDER_HISTORY = 'OrderHistory';  //消费记录
    const API_ORDER_DETAIL = 'OrderDetail';  //音箱消费记录详情

    const API_GIFT_LIST = 'GiftList';  //获取礼品列表
    const API_GIFT_INFO = 'GiftInfo';  //礼品详情
    const API_GIFT_EXCHANGE = 'GiftExchange';  //积分总的礼品

    const API_SHOP_LIST = 'ShopList';  //分店列表
    const API_SHOP_INFO = 'ShopInfo';  //分享/商家信息

    const API_LEVEL_LIST = 'LevelList';  //获取等级列表

    const API_RECHARGE_HISTORY = 'RechargeHistory';  //充值记录
    const API_RECHARGE_DETAUL = 'RechargeDetaul';  //充值记录详情

    const API_POINT_HISTORY = 'PointHistory';  //积分变动记录
    const API_POINT_DETAUL = 'PointDetaul';  //积分变动记录详情
}
