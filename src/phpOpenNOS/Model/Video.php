<?php

namespace phpOpenNOS\Model;

use \Datetime;
use phpOpenNOS\Model\Base;

class Video extends Base
{
    protected $embedcode;

    /**
     * Embedcode getter method
     *
     * @return string
     */
    public function getEmbedCode()
    {
        return $this->embedcode;
    }

    /**
     * Embedcode setter method
     *
     * @param string $embedcode
     * @return void
     */
    public function setEmbedCode($embedcode)
    {
        $this->embedcode = $embedcode;
    }

    /**
     * Create an Video object from XML
     *
     * @static
     * @param SimpleXMLElement $xml
     * @return phpOpenNOS\Model\Video
     */
    static public function fromXML(\SimpleXMLElement $xml)
    {
        $video = new Video();
        $video->setId((int) $xml->id);
        $video->setTitle((string) $xml->title);
        $video->setDescription((string) $xml->description);
        $video->setPublished((string) $xml->published);
        $video->setLastUpdate((string) $xml->last_update);
        $video->setThumbnailXS((string) $xml->thumbnail_xs);
        $video->setThumbnailS((string) $xml->thumbnail_s);
        $video->setThumbnailM((string) $xml->thumbnail_m);
        $video->setLink((string) $xml->link);
        $video->setEmbedCode((string) $xml->embedcode);

        $keywords = array();
        foreach($xml->keywords->keyword as $keyword)
        {
            $keywords[] = (string) $keyword;
        }

        $video->setKeywords($keywords);

        return $video;
    }
}