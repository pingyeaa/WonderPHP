<?php
/**
 * 入口文件
 * @author Enoch
 * @date 2015-04-09
 */

# 1、定义根目录
define('ROOT_PATH', __DIR__);

# 2、引入自动加载类
require_once realpath(ROOT_PATH . '/' . 'framework/libs/ClassLoader.php');

# 3、实例化WonderPHP并运行
\framework\WonderPHP::app('Home')->run();