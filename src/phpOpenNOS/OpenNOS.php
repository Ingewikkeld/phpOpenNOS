<?php

namespace phpOpenNOS;

require_once __DIR__.'/../vendor/Symfony/Component/HttpFoundation/UniversalClassLoader.php';

use Symfony\Component\HttpFoundation\UniversalClassLoader;

$loader = new UniversalClassLoader();
$loader->registerNamespaces(array(
    'phpOpenNOS'  => dirname(__FILE__).'/..',
));
$loader->register();

use phpOpenNOS\Model\Article;

class OpenNOS
{
    protected $apikey;

    public function __construct($apikey)
    {
        $this->apikey = $apikey;
    }

    public function getLatestArticles()
    {
        $url = 'http://open.nos.nl/v1/latest/article/key/'.$this->apikey.'/output/xml/category/nieuws/';
        $articles = array();

        $xml = $this->request($url);
        foreach($xml->article as $article)
        {
            $articles[] = Article::fromXML($article);
        }

        return $articles;
    }

    protected function request($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        return simplexml_load_string(curl_exec($curl));
    }
    
}

