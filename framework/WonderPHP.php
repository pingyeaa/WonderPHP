<?php
/**
 * 框架入口
 * @author Enoch
 * @date 2015-04-09
 */

namespace framework;

use framework\libs\Config;
use framework\libs\Registry;
use framework\libs\Route;
use Home\Controller\IndexController;

class WonderPHP
{
    private static $appName;
    protected $config;
    private $decoratorArray = array();

    /**
     * 设置应用名称
     * @params string $appName 应用名称
     * @author Enoch 2015-04-09
     */
    static function app($appName = 'Home')
    {
        $obj = new self;
        $obj::$appName = $appName;
        return $obj;
    }

    /**
     * 开始框架程序
     * @author Enoch 2015-04-09
     */
    public function run()
    {
        session_start();
        $registry = new Registry();
        $this->config = new Config();
        new Route($registry);
        $this->initDecorator();
        $this->beforeAction();
        $this->runController();
        $this->afterAction();
    }

    /**
     * 动作执行前执行的Action
     * @author Enoch 2015-04-10
     */
    private function beforeAction()
    {
        if(!$this->decoratorArray){ return;}
        foreach ($this->decoratorArray as $v)
        {
            $v->beforeAction();
        }
    }

    /**
     * 动作执行后执行的Action
     * @author Enoch 2015-04-10
     */
    private function afterAction()
    {
        if(!$this->decoratorArray){ return;}
        $this->decoratorArray = array_reverse($this->decoratorArray);
        foreach ($this->decoratorArray as $v)
        {
            $v->afterAction();
        }
    }

    /**
     * 初始化装饰器
     * @author Enoch 2015-04-10
     */
    private function initDecorator()
    {
        if(!isset($this->config['Controller']['decorator'])) { return; }
        foreach ($this->config['Controller']['decorator'] as $v)
        {
            $this->decoratorArray[] = new $v;
        }
    }

    /**
     * 调用路由解析出的控制器及动作
     * @author Enoch 2015-04-10
     */
    private function runController()
    {
        $controller = '\\' . strtolower(self::$appName) . '\\controller\\' . Registry::get('controller');
        $action = 'action' . Registry::get('action');
        $controllerObj = new $controller;
        $controllerObj->$action();
    }
}