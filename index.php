<?php
mb_internal_encoding("UTF-8");

include 'PostParser.php';
include 'Database.php';

$connect = Database::setConnection('localhost', 'max', 'number13', 'parser');

if ($connect == false) {
    print("Error: can`t connect to MySQL " . mysqli_connect_error());
} else {
    print("Connection stable");
}

$Parser = new PostParser;
$Parser->url = "https://gagadget.com/articles/";

$title = $Parser->get_title();
$author = $Parser->get_author();
$date = $Parser->get_date();
//$post_content = $Parser->get_post_content();

echo '<pre>';
foreach ($title as $x => $x_value) {
    echo $x . "=" . $x_value;
    echo "<br>";
}
echo '</pre>';
echo '<pre>';

foreach ($author as $x => $x_value) {
    echo $x . "=" . $x_value;
    echo "<br>";
}
echo '</pre>';
echo '<pre>';

foreach ($date as $x => $x_value) {
    echo $x . "=" . $x_value;
    echo "<br>";
}
echo '</pre>';

//echo '<pre>';
//foreach ($post_content as $x => $x_value) {
//    echo $x . "=" . $x_value;
//    echo "<br>";
//}
//echo '</pre>';
