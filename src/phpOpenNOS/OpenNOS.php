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
use phpOpenNOS\Model\Video;
use phpOpenNOS\Model\Audio;

class OpenNOS
{
    const NEWS  = 'nieuws';
    const SPORT = 'sport';

    protected $apikey;

    public function __construct($apikey)
    {
        $this->apikey = $apikey;
    }

    public function getLatestArticles($category = self::NEWS)
    {
        $url = 'http://open.nos.nl/v1/latest/article/key/'.$this->apikey.'/output/xml/category/'.$category.'/';
        $articles = array();

        $xml = $this->request($url);
        foreach($xml->article as $article)
        {
            $articles[] = Article::fromXML($article);
        }

        return $articles;
    }

    public function getLatestVideos($category = self::NEWS)
    {
        $url = 'http://open.nos.nl/v1/latest/video/key/'.$this->apikey.'/output/xml/category/'.$category.'/';
        $videos = array();

        $xml = $this->request($url);
        foreach($xml->video as $video)
        {
            $videos[] = Video::fromXML($video);
        }

        return $videos;
    }

    public function getLatestAudio($category = self::NEWS)
    {
        $url = 'http://open.nos.nl/v1/latest/audio/key/'.$this->apikey.'/output/xml/category/'.$category.'/';
        $audios = array();

        $xml = $this->request($url);
        foreach($xml->video as $audio)
        {
            $audios[] = Audio::fromXML($audio);
        }

        return $audios;
    }

    protected function request($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        return simplexml_load_string(curl_exec($curl));
    }
    
}

