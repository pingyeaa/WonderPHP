<?php


namespace admin\model;

use framework\libs\Model;

class Admin extends Model
{
    public function table()
    {
        return 'wonder_admin';
    }

    public function search($name)
    {
        echo $name;
    }
}