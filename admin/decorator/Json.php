<?php
/**
 * 登录装饰器
 * @desc 用于判断用户是否登录
 * @author Enoch
 * @date 2015-04-10
 */

namespace admin\decorator;

use framework\libs\Decorator;

class Json implements Decorator
{
    public function beforeAction()
    {
        echo '<div style="color:red">';
    }

    public function afterAction()
    {
        echo ' </div>';
    }
}