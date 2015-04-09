<?php
/**
 * 注册器
 * @author Enoch
 * @date 2015-04-09
 */

namespace framework\libs;

class Registry
{
    private static $config = array();

    /**
     * 根据键名获取值
     * @param string $key 键
     * @author Eonch 2015-04-09
     */
    public static function get($key = '')
    {
        return self::$config[$key];
    }

    /**
     * 将键值存入数组
     * @param string $key 键
     * @param mix $value 值
     * @author Enoch 2015-04-09
     */
    public static function set($key = '', $value = '')
    {
         self::$config[$key] = $value;
    }
}