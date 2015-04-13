<?php
/**
 * 控制器基类
 * @author Enoch
 * @date 2015-04-10
 */

namespace framework\libs;

class Controller extends Template
{
    protected $config;

    /**
     * 构造函数
     * @desc 不要重写此方法，如果需要初始化请调用init函数
     * @author Enoch 2015-04-11
     */
    public function __construct()
    {
        parent::__construct();
        $this->config = new Config();
        $this->init();
    }

    /**
     * 初始化方法
     * @desc 子类可以重写此方法
     * @author Enoch 2015-04-11
     */
    protected function init() {}
}