<?php
/**
 * Created by PhpStorm.
 * User: zhangyinuo
 * Date: 15/4/10
 * Time: 下午12:56
 */

namespace admin\controller;

use admin\model\Admin;
use framework\libs\Controller;

class Index extends Controller
{
    public function init()
    {
        //echo 'init';
    }

    public function actionIndex()
    {
        $admin = new Admin();
        //$result = $admin->find(array('id' => "2"));
        $result = $admin->insert(array('id' => 3, 'user_name' => 'muki'));
        var_dump($result);exit;
//        echo $this->config['config']['templateSuffix'];
//        $this->assign('test', 123);
//        $this->display();
    }
}