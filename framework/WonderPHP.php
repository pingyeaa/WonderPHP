<?php
/**
 * 框架入口
 * @author Enoch
 * @date 2015-04-09
 */

namespace framework;

use framework\libs\Config;
use framework\libs\Registry;

class WonderPHP
{
    private static $appName;

    /**
     * 设置应用名称
     * @param string $appName 应用名称
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
        $registry = new Registry();
        $config = new Config();
        var_dump($config['Controller']);
    }
}