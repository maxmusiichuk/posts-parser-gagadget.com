<?php
mb_internal_encoding("UTF-8");
$url = 'https://gagadget.com/articles/';
$content= file_get_contents($url);

// get post title
echo "<pre>";
preg_match_all('/<h2.*class=\"b-nodetop__text\"><a href=\"(.*?)\">(.*?)<\/a>(.*?)<\/h2>/U', $content, $match_t);
print_r($match_t[2]);
echo "</pre>";

// get post author
echo "<pre>";
preg_match_all('/<a.*href=\"(.+)\".*class=\"b-node-author__name\">(.+)<\/a>/U', $content, $match_n);
print_r($match_n[2]);
echo "</pre>";

// get post creating date
echo "<pre>";
preg_match_all('/<span.*class=\"b-node-author__date\">(.*?)<\/span>/U', $content, $match_d);
print_r($match_d[0]);
echo "</pre>";

//get post content not finished version
//$content = trim(preg_replace('/\s\s+/', ' ', $content));
preg_match_all('/<div.*class=\"b-node-list-item__text b-font-def\">\n\t\t\t\t\t<p>(.*)<\/p>\n\t\t\t\t<\/div>/U', $content, $match_c);
print_r($match_c[0]);
