# LuckSDK

纳客会员软件是一系列成熟的会员管理系统软件，由湖北宜昌纳新网络科技有限公司研发。软件拥有经典版、企业版、商盟大众版和商盟旗舰版多个不同版本，并提供按需定制服务，可满足不同的业务需求。目前已有数万忠实客户，管理着数千万会员数据。  
会员系统提供了较为全面的开放接口，在获取官方授权之后，第三方系统可利用相关接口对接，实现会员数据共享、同步等功能。为方便PHP类WEB应用对接，现推出本SDK。

## 安装

环境要求：PHP >= 5.3.0，并安装 mycypt 扩展。

1. 使用 [composer](https://getcomposer.org/)

  ```shell
  composer require "tianyong90/lucksdk:1.*"
  ```

2. 手动安装

  下载 [1.x版zip包](https://github.com/tianyong90/lucksdk/archive/master.zip)  或者[其它版本](https://github.com/tianyong90/lucksdk/releases)

  然后引入根目录的autoload.php即可：

  ```php
  <?php

  require "lucksdk/autoload.php"; // 路径请修改为你具体的实际路径

  # your code
  ```

## 使用示例

  以会员注册为例（其它接口方法调用类似，参数请参考纳客网络相关官方文档）

  ```php
  <?PHP

  use Tianyong90\LuckSDK\LuckHelper;
  use Tianyong90\LuckSDK\API;

  $config = [
      'debug' => true,
      'luck_url' => 'http://www.800vip.cn',
      'luck_key' => '123',
      'luck_version' => LuckHelper::LUCK_VERSION_ENTERPRISE,
      'company_code' => 'test',
  ];

  $luckHelper = new LuckHelper($config);

  $data['CardID'] = '12345678';
  $data['Name'] = '张三';
  $data['Sex'] = '1';
  $data['Mobile'] = '13211112222';
  $data['PassWord'] = '123456';

  $result = $luckHelper->callnake(API::API_MEM_REG, $data);
  var_dump($result);
  ```

## 特别说明

  本SDK为方便第三方PHP类系统对接纳客会员系统软件而推出。    
  纳客会员软件是一列表成熟的会员管理系统软件，拥有不同的版本，适合各种行业，可移步 [湖北宜昌纳新网络科技有限公司官网](http://www.liansuovip.com/) 查看相关软件详情。有意者欢迎在线咨询。  
  对接会员系统需要获取官方授权的接口密钥。    
  本SDK最终解释权归湖北宜昌纳新网络科技有限公司所有。  

## 授权
MIT
