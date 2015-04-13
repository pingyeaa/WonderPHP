<?php
/**
 * 模板类
 * @desc 封装Smarty方法
 * @author Enoch
 * @date 2015-04-10
 */

namespace framework\libs;

class Template
{
    private $template;

    public function __construct()
    {
        require ROOT_PATH . '/framework/smarty/Smarty.class.php';
        $this->template = new \Smarty();

        $this->template->setTemplateDir(ROOT_PATH . '/' . Registry::get('appName') . '/view');
        $this->template->setCompileDir(ROOT_PATH . '/framework/compile');
        $this->template->setConfigDir(ROOT_PATH . '/framework/config');
        $this->template->setCacheDir(ROOT_PATH . '/framework/cache');
    }

    /**
     * 赋值变量
     * @param $tpl_var
     * @param null $value
     * @param bool $nocache
     */
    protected function assign($tpl_var, $value = null, $nocache = false)
    {
        $this->template->assign($tpl_var, $value, $nocache);
    }

    /**
     * 调用模板
     * @param null $template
     * @param null $cache_id
     * @param null $compile_id
     * @param null $parent
     */
    protected function display($template = null, $cache_id = null, $compile_id = null, $parent = null)
    {
        # 1、获取模板后缀名、控制器及动作名称
        $config = new Config();
        $suffix = isset($config['config']['templateSuffix']) ? $config['config']['templateSuffix'] : 'html';
        $controller = Registry::get('controller');
        $action = Registry::get('action');

        # 2、如果模板传入为空，则直接调用当前控制器动作模板
        if(!$template)
        {
            $template = $controller . '/' . $action;
        }

        # 3、验证模板是否传入控制器名称，没有则自动补全当前控制器
        if(!strpos($template, '/'))
        {
            $template = $controller . '/' . $template;
        }

        # 4、验证是否传入模板后缀名，没有后缀名则自动补填
        if(!strpos($template, '.'))
        {
            $template .= '.' . $suffix;
        }

        $this->template->display($template, $cache_id, $compile_id, $parent);
    }
}