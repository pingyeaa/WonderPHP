<?php
/**
 * 模板类
 * @desc 封装Smarty方法
 * @author Enoch
 * @date 2015-04-10
 */

namespace framework\libs;

require_once ROOT_PATH . '/framework/smarty/Smarty.class.php';

class Template extends Smarty
{
    //private $smarty;

    public function __construct()
    {
        parent::__construct();
//        $this->smarty = new \Smarty();
//        $this->smarty->caching = true;
//        $this->smarty->template_dir = ROOT_PATH . '/' . Registry::get('appName') . '/view';
//        $this->smarty->compile_dir = "../compile";
//        $this->smarty->cache_dir = "../cache";
        $this->caching = true;
        $this->template_dir = ROOT_PATH . '/' . Registry::get('appName') . '/view';
        $this->compile_dir = "../compile";
        $this->cache_dir = "../cache";
    }

//    /**
//     * 赋值变量
//     * @param $tpl_var
//     * @param null $value
//     * @param bool $nocache
//     */
//    public function assign($tpl_var, $value = null, $nocache = false)
//    {
//        $this->smarty->assign($tpl_var, $value = null, $nocache = false);
//    }
//
//    /**
//     * 调用模板
//     * @param null $template
//     * @param null $cache_id
//     * @param null $compile_id
//     * @param null $parent
//     */
//    public function display($template = null, $cache_id = null, $compile_id = null, $parent = null)
//    {
//        $this->smarty->display($template = null, $cache_id = null, $compile_id = null, $parent = null);
//    }
}