<?php
/**
 * 自动加载类
 * @author Enoch
 * @date 2015-04-09
 */

namespace framework\libs;

class LClassLoader
{
    /**
     * 载入类
     * @param string $className 类名
     * @author Enoch 2015-04-09
     */
    public function load($className = '')
    {
        echo $className;exit;
    }
}

spl_autoload_register(array('LClassLoader', 'load'));