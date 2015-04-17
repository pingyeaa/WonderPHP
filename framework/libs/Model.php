<?php
/**
 * 模型类
 * @desc 封装数据库的增删改查
 * @author Enoch
 * @date 2015-04-11
 */

namespace framework\libs;

use framework\libs\database\MySql;

class Model
{
    private $handle;
    protected $table;
    public $message;    //错误提示信息，返回false时可以调用该属性查看

    /**
     * 初始化
     * @author Enoch 2015-04-11
     */
    public function __construct()
    {
        # 1、根据数据库配置文件实例数据库类
        $config = new Config;
        $sqlType = $config['database']['type'];
        switch($sqlType) {
            case 'mysql':
                $this->handle = new MySql();
                break;
        }

        # 2、连接数据库
        $this->handle->connect();

        # 3、获取子模型对应的数据表
        $this->table = $this->table();
    }

    /**
     * 表名
     * @desc 子模型应重写此方法
     * @author Enoch 2015-04-11
     */
    protected function table()
    {
        return '';
    }

    /**
     * 根据条件查询多条数据
     * @params array $condition 查询条件
     * @author Enoch 2015-04-11
     */
    public function findAll($condition = array())
    {
        $sql = "select * from {$this->table}";
        if(!$condition)
        {
            return $this->handle->query($sql);
        }
        $condition = $this->filter($condition);
        $where = ' where 1=1 and ';
        foreach($condition as $k => $v)
        {
            $where .= $k . ' = ' . $v . ' ';
        }
        $sql = $sql . $where;
        return $this->handle->query($sql);
    }

    /**
     * 插入数据
     * @params array $data 要插入的数据
     * @author Enoch 2015-04-11
     */
    public function insert($data = array())
    {
        if(!$data)
        {
            $this->message = '插入数据为空';
            return false;
        }
        $data = $this->filter($data);
        $keys = '';
        $values = '';
        foreach($data as $k => $v)
        {
            $keys .= "`" . $k . "`,";
            $values .= "`" . $v . "`,";
        }
        $keys = substr($keys, 0, -1);
        $values = substr($values, 0, -1);
        $sql = "insert into {$this->table} ({$keys}) values ({$values}) ";
        return $this->handle->execute($sql);
        
    }

    /**
     * 析构函数
     */
    public function __destruct()
    {
        $this->handle->close();
    }

    /**
     * 过滤数组参数（防注入）
     * @params array $param 入参
     * @author Enoch 2015-04-11
     */
    public function filter($param = array())
    {
        $result = array();
        foreach($param as $k => $v)
        {
            $result[addslashes($k)] = addslashes($v);
        }
        return $result;
    }
}