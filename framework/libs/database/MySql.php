<?php
/**
 * mysql类
 * @author Enoch
 * @date 2015-04-11
 */

namespace framework\libs\database;

use framework\libs\Config;
use framework\libs\DataBase;

class MySql implements DataBase
{
    public static $instance;

    public function connect()
    {
        $config = new Config();
        $host = $config['database']['host'];
        $dbname = $config['database']['dbname'];
        $username = $config['database']['username'];
        $password = $config['database']['password'];
        $charset = $config['database']['charset'];
        $conn = mysql_connect($host, $username, $password);
        mysql_select_db($dbname, $conn);
        mysql_query("set names $charset");
    }

    /**
     * 查询数据库
     * @param string $sql
     * @return array
     * @author Enoch 2015-04-11*
     */
    public function query($sql = '')
    {
        $result = mysql_query($sql);
        $resultArray = array();
        while($row = mysql_fetch_row($result))
        {
            $resultArray[] = $row;
        }
        return $resultArray;
    }

    /**
     * 执行sql语句
     * @params string $sql
     * @author Enoch 2015-04-11
     */
    public function execute($sql = '')
    {
        $result = mysql_query($sql);
    }

    public function close()
    {
        mysql_close();
    }

    /**
     * 获取插入id
     * @author Enoch 2015-05-17
     */
    public function getLastId()
    {
        return mysql_insert_id();
    }

    /**
     * 获取实例
     * @author Enoch 2015-04-11
     */
    static function getInstance()
    {
        if(!(self::$instance instanceof self))
        {
            self::$instance  = new self;
        }
        return self::$instance;
    }
}