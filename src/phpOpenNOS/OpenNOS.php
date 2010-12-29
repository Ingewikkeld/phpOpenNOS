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
use phpOpenNOS\Model\Dayguide;

class OpenNOS
{
    const NEWS  = 'nieuws';
    const SPORT = 'sport';

    protected $apikey;
    protected $typeMapping = array(
        'artikel' => 'phpOpenNOS\Model\Article',
        'video' => 'phpOpenNOS\Model\Video',
        'audio' => 'phpOpenNOS\Model\Audio',
    );

    public function __construct($apikey)
    {
        $this->apikey = $apikey;
    }

    /**
     * Get the latest articles for the specified category
     *
     * @param string $category
     * @return array
     */
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

    /**
     * Get the latest videos for the specified category
     *
     * @param string $category
     * @return array
     */
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

    /**
     * Get the latest audio for the specified category
     *
     * @param string $category
     * @return array
     */
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

    /**
     * Search for the specified search query
     *
     * @param string $query
     * @return array
     */
    public function search($query)
    {
        $url = 'http://open.nos.nl/v1/search/query/key/'.$this->apikey.'/output/xml/q/'.urlencode($query);
        $documents = array();

        $xml = $this->request($url);
        foreach($xml->documents->document as $document)
        {
            $type = $this->getType((string) $document->type);
            $documents[] = $type::fromXML($document);
        }

        return $documents;
    }

    /**
     * Get the TV broadcasts for the specified period and channel (optional)
     * 
     * @param string $startdate
     * @param string $enddate
     * @param string $channel
     * @return array
     */
    public function getTvBroadcast($startdate = '', $enddate = '', $channel = '')
    {
        $dayguides = array();

        $url = 'http://open.nos.nl/v1/guide/tv/key/'.$this->apikey.'/output/xml/';
        if (!empty($startdate) && !empty($enddate))
        {
            $startdate = new \DateTime($startdate);
            $enddate = new \Datetime($enddate);

            $url .= 'start/'.$startdate->format('Y-m-d').'/end/'.$enddate->format('Y-m-d').'/';
        }
        if (!empty($channel))
        {
            $url .= 'channel/'.$channel.'/';
        }

        $xml = $this->request($url);
        foreach($xml->dayguide as $day)
        {
            $dayguides[] = Dayguide::fromXml($day);
        }

        return $dayguides;
    }

    /**
     * Get the Radio broadcasts for the specified period and channel (optional)
     *
     * @param string $startdate
     * @param string $enddate
     * @param string $channel
     * @return array
     */
    public function getRadioBroadcast($startdate = '', $enddate = '', $channel = '')
    {
        $dayguides = array();

        $url = 'http://open.nos.nl/v1/guide/radio/key/'.$this->apikey.'/output/xml/';
        if (!empty($startdate) && !empty($enddate))
        {
            $startdate = new \DateTime($startdate);
            $enddate = new \Datetime($enddate);

            $url .= 'start/'.$startdate->format('Y-m-d').'/end/'.$enddate->format('Y-m-d').'/';
        }
        if (!empty($channel))
        {
            $url .= 'channel/'.$channel.'/';
        }

        $xml = $this->request($url);
        foreach($xml->dayguide as $day)
        {
            $dayguides[] = Dayguide::fromXml($day);
        }

        return $dayguides;
    }

    /**
     * Execute a request
     *
     * @param string $url
     * @return SimpleXMLElement
     */
    protected function request($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        return simplexml_load_string(curl_exec($curl));
    }

    /**
     * Get the type of the document
     *
     * @throws Exception
     * @param SimpleXMLElement $key
     * @return
     */
    protected function getType($key)
    {
        if (isset($this->typeMapping[$key]))
        {
            return $this->typeMapping[$key];
        }
        throw new \Exception('Unknown document type '.$key);
    }
    
}

