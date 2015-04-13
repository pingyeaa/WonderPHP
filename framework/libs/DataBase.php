<?php
/**
 * 数据库接口
 * @author Enoch
 * @date 2015-04-11
 */

namespace framework\libs;

interface DataBase
{
    public function connect();
    public function query();
    public function close();
    public function execute();
}