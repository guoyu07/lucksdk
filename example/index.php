<?php

require_once '../autoload.php';

use Tianyong90\LuckSDK\LuckHelper;
use Tianyong90\LuckSDK\API;

$config = [
    'debug' => true,
    'luck_url' => 'http://www.800vip.cn',
    'luck_key' => 'test',
    'luck_version' => LuckHelper::LUCK_VERSION_ENTERPRISE,
    'company_code' => 'test',
];

$luckHelper = new LuckHelper($config);

$data['CardID'] = '12345678';
$data['Name'] = '张三';
$data['Sex'] = '1';
$data['Mobile'] = '13211112222';
$data['PassWord'] = '123456';

$result = $luckHelper->callnake(API::API_TEST, $data);
var_dump($result);
