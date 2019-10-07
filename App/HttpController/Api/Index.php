<?php
/**
 * ============================================================================
 * * COPYRIGHT 2019-2020 hskphp.cn , and all rights reserved.
 * * WEBSITE: http://www.hskphp.cn;
 * ----------------------------------------------------------------------------
 *  梦痕网络工作室
 * ============================================================================
 * Author: index QQ：76101700
 */
namespace App\HttpController\Api;
use App\HttpController\Base;
use EasySwoole\Mysqli\Client;
use EasySwoole\Mysqli\Config;
class Index extends  Base
{
    function index()
    {
        return "Easyswole学习";
    }

    function  read()
    {
        $data = [
            'id'=>1,
            'name'=>'zhang'
        ];
      $this->writeJson(200,$data,'ok');
    }
    function  value()
    {
        $configArr = \EasySwoole\EasySwoole\Config::getInstance()->getConf('MYSQL');
        $config = new Config($configArr);
        $db = new Client($config);
        go(function ()use($db){
            //构建sql
            $db->queryBuilder()->get('user');
            //执行sql>execBuilder()
            var_dump($db);
        });
    }
    function  pay()
    {
        var_dump("test");
        var_dump("test");
        $aliConfig = new \EasySwoole\Pay\AliPay\Config();
        $aliConfig->setGateWay(\EasySwoole\Pay\AliPay\GateWay::NORMAL);
        $aliConfig->setAppId('2017082000295641');
        $aliConfig->setPublicKey('阿里公钥');
        $aliConfig->setPrivateKey('阿里私钥');
        $pay = new \EasySwoole\Pay\Pay();
## 对象风格
        $order = new \EasySwoole\Pay\AliPay\RequestBean\Web();
        $order->setSubject('测试');
        $order->setOutTradeNo(time().'123456');
        $order->setTotalAmount('0.01');
// 本库只预置了常用的请求参数，没预置的参数使用：$order->addProperty('其他字段','其他字段值');
## 数组风格
        $order = new \EasySwoole\Pay\AliPay\RequestBean\App([
            'subject'=>'测试',
            'out_trade_no'=>'123456',
            'total_amount'=>'0.01',
            '额外的字段键值'=>'额外字段值'
        ],true);
        $res = $pay->aliPay($aliConfig)->web($order);
        var_dump($res->toArray());
        $html = buildPayHtml(\EasySwoole\Pay\AliPay\GateWay::NORMAL,$res->toArray());
        file_put_contents('test.html',$html);

    }
}
