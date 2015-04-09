<?php
/**
 * 框架入口
 * @author Enoch
 * @date 2015-04-09
 */

namespace framework;

class WonderPHP
{
    /**
     * 初始化
     * @param string $appName 应用名称
     * @author Enoch 2015-04-09
     */
    public function __construct($appName = 'Home')
    {
        echo $appName;
    }

    static function run()
    {

    }
}