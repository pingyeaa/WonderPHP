<?php
/**
 * 自动加载类
 * @author Enoch
 * @date 2015-04-09
 */

namespace framework\libs;

class ClassLoader
{
    /**
     * 载入类
     * @param string $className 类名
     * @author Enoch 2015-04-09
     */
    public function load($className = '')
    {
        if(strpos($className, 'Smarty'))
        {
            echo ROOT_PATH . '/' . str_replace('\\', '/', $className) . '.php';
        }
        require ROOT_PATH . '/' . str_replace('\\', '/', $className) . '.php';
    }
}

spl_autoload_register(array(new ClassLoader(), 'load'));