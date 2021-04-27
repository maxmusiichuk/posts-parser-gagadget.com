<?php


class Database
{
    public static function setConnection($host, $user, $pass, $name)
    {
        $link = mysqli_connect($host, $user, $pass, $name);
        $link->set_charset('utf-8');
        return $link;
    }
}