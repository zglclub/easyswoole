<?php
/**
 * ============================================================================
 * * COPYRIGHT 2019-2020 hskphp.cn , and all rights reserved.
 * * WEBSITE: http://www.hskphp.cn;
 * ----------------------------------------------------------------------------
 *  梦痕网络工作室
 * ============================================================================
 * Author: Base QQ：76101700
 */
namespace App\HttpController;
use EasySwoole\Http\AbstractInterface\Controller;
class Base extends Controller
{
    /**
     * 首页渲染
     */
    function index()
    {
    }

    /**
     * 可以充当一个拦截器
     * @param string|null $action
     * @return bool|null
     */
    public function onRequest(?string $action): ?bool
    {

        //return $this->writeJson(200,'name','ok');
      //  return parent::onRequest($action); // TODO: Change the autogenerated stub
        return true;
    }

    /**
     * 异常处理
     * @param \Throwable $throwable
     */
    function  onException(\Throwable $throwable): void
    {

        $this->writeJson(404,'ok',"请求不合法");
    }
}