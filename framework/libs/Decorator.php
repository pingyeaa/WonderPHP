<?php
/**
 * 装饰器接口
 * @author Enoch
 * @date 2015-04-10
 */

namespace framework\libs;

interface Decorator
{
    public function beforeAction();
    public function afterAction();
}