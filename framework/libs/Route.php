<?php
/**
 * 路由类
 * @author Enoch
 * @date 2015-04-10
 */

namespace framework\libs;

class Route
{
    private static $registry;
    public $controller;
    public $action;

    public function __construct(Registry $registry)
    {
        self::$registry = $registry;

        // 验证当前请求模式
        if(isset($_SERVER['PATH_INFO']))
        {
            $this->pathInfo();
        }
        else
        {
            $this->normal();
        }
    }

    /**
     * PATH_INFO模式获取参数
     * @author Enoch 2015-04-10
     */
    protected function pathInfo()
    {
        # 1、获取PATH_INFO并配置控制器及动作
        $pathInfoArray = array_values(array_filter(explode('/', $_SERVER['PATH_INFO'])));
        if(!$pathInfoArray)
        {
            $this->controller = 'Index';
            $this->action = 'Index';
            return;
        }
        $this->controller = $pathInfoArray[0];
        array_shift($pathInfoArray);
        if(!$pathInfoArray)
        {
            $this->action = 'Index';
            return;
        }
        $this->action = $pathInfoArray[0];
        array_shift($pathInfoArray);

        # 2、获取请求参数
        if(!$pathInfoArray)
        {
            return;
        }
        foreach ($pathInfoArray as $k => $v)
        {
            // 偶数为键，奇数为值
            if(is_numeric($k)&(!($k&1)))
            {
                $_GET[$v] = '';
            }
            else
            {
                $_GET[$pathInfoArray[$k-1]] = $v;
            }
        }
    }

    /**
     * 普通模式获取参数
     * @author Enoch 2015-04-10
     */
    protected function normal()
    {
        $this->controller = isset($_GET['m']) ? $_GET['m'] : 'Index';
        $this->action = isset($_GET['a']) ? $_GET['a'] : 'Index';
        unset($_GET['m']);
        unset($_GET['a']);
    }

    /**
     * 将内容添加入注册器
     * @params string $key 键
     * @params mix $value 值
     * @author Enoch 2015-04-10
     */
    private function _setRegistry($key = '', $value = '')
    {
        $registry = self::$registry;
        $registry::set($key, $value);
    }

    /**
     * 将键值添加入注册器
     * @param string $key
     * @param string $value
     */
    private function setRegistry($key = '', $value = '')
    {
        $registry = self::$registry;
        $registry::set($key, $value);
    }

    public function __destruct()
    {
        $this->setRegistry('controller', ucfirst(strtolower($this->controller)));
        $this->setRegistry('action', ucfirst(strtolower($this->action)));
    }
}