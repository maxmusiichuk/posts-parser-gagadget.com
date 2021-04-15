<?php
mb_internal_encoding("UTF-8");
//$url = 'https://gagadget.com/articles/';
//$content = file_get_contents($url);

class PostParser
{

    public $url;

    public function get_content()
    {
        $url = $this->url;
        $get_content = file_get_contents($url);
        return $get_content;
    }

    public function get_title()
    {
        $url = $this->url;
        $content = $this->get_content($url);
        preg_match_all('/<h2.*class=\"b-nodetop__text\"><a href=\"(.*?)\">(.*?)<\/a>(.*?)<\/h2>/U', $content, $match_t);
        return $match_t[2];
    }

    public function get_author()
    {
        $url = $this->url;
        $content = $this->get_content($url);
        preg_match_all('/<a.*href=\"(.+)\".*class=\"b-node-author__name\">(.+)<\/a>/U', $content, $match_n);
        return $match_n[2];
    }

    public function get_date()
    {
        $url = $this->url;
        $content = $this->get_content($url);
        preg_match_all('/<span.*class=\"b-node-author__date\">(.*?)<\/span>/U', $content, $match_d);
        return $match_d[0];
    }

    public function get_post_content()
    {
        $url = $this->url;
        $content = $this->get_content($url);
        preg_match_all('/<div.*class=\"b-node-list-item__text b-font-def\">\n\t\t\t\t\t<p>(.*)<\/p>\n\t\t\t\t<\/div>/U', $content, $match_c);
        return $match_c[0];
    }

}

$Parser = new PostParser;
$Parser->url = "https://gagadget.com/articles/";
$url_data = $Parser->get_title();
echo "<pre>";
print_r($url_data);
$url_data = $Parser->get_post_content();
print_r($url_data);
echo "<pre></pre>";
$url_data = $Parser->get_author();
print_r($url_data);
echo "<pre></pre>";
$url_data = $Parser->get_date();
print_r($url_data);
echo "<pre></pre>";