<?php
/**
 * 日志
 * @author Enoch
 * @date 2015-05-21
 */

namespace framework\libs;

class Log
{
    /**
     * 获取SQL执行信息
     * @desc 显示SQL执行时间、内存消耗、语句内容等
     * @return array 执行信息
     * @author Enoch 2015-05-21
     */
    public static function getSQLExecuteListInfo()
    {

    }

    /**
     * 根据标识符查看某块程序执行信息
     * @desc 如果token为空则返回所有执行信息
     * @param string $token 标识符
     * @return array 执行信息
     * @author Enoch 2015-05-21
     */
    public static function getExecuteInfoWithToken($token = '')
    {

    }
}