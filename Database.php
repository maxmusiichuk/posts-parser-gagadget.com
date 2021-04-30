<?php


class Database
{
    public static function setConnection($host, $user, $pass, $name)
    {
        $link = mysqli_connect($host, $user, $pass, $name);
        $link->set_charset('utf8mb4');
        return $link;
    }

    public static function recordInBase($dbname, $title, $author, $date, $content)
    {
        $sql = "INSERT INTO $dbname(title, author, date, content) VALUES ('$title', '$author', '$date', '$content')";
        return $sql;
    }
}
