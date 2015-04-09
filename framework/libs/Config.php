<?php
/**
 * 配置文件解析
 * @author Enoch
 * @date 2015-04-09
 */

namespace framework\libs;

class Config implements \ArrayAccess
{
    protected $config = array();

    /**
     * 根据配置文件名称获取配置内容数组
     * @param string $offset 配置文件名称
     * @return array
     * @author Enoch 2015-04-09
     */
    public function offsetGet($offset)
    {
        if(!isset($this->config[$offset]))
        {
            $this->config[$offset] = require ROOT_PATH . '/framework/config/' . ucfirst(strtolower($offset)) . '.php';
        }
        return $this->config[$offset];
    }

    public function offsetExists($offset)
    {

    }

    public function offsetSet($offset, $value)
    {

    }

    public function offsetUnset($offset)
    {

    }
}