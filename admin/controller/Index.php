<?php
/**
 * Created by PhpStorm.
 * User: zhangyinuo
 * Date: 15/4/10
 * Time: 下午12:56
 */

namespace admin\controller;

use framework\libs\Controller;

class Index extends Controller
{
    public function actionIndex()
    {
        $this->assign('test', 123);
        $this->display('Index/index.html');
    }
}