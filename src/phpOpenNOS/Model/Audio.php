<?php

namespace phpOpenNOS\Model;

use phpOpenNOS\Model\Base;

class Audio extends Base
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
     * Create an Audio object from XML
     *
     * @static
     * @param SimpleXMLElement $xml
     * @return phpOpenNOS\Model\Audio
     */
    static public function fromXML(\SimpleXMLElement $xml)
    {
        $audio = new Audio();
        $audio->setId((int) $xml->id);
        $audio->setTitle((string) $xml->title);
        $audio->setDescription((string) $xml->description);
        $audio->setPublished((string) $xml->published);
        $audio->setLastUpdate((string) $xml->last_update);
        $audio->setThumbnailXS((string) $xml->thumbnail_xs);
        $audio->setThumbnailS((string) $xml->thumbnail_s);
        $audio->setThumbnailM((string) $xml->thumbnail_m);
        $audio->setLink((string) $xml->link);
        $audio->setEmbedCode((string) $xml->embedcode);

        $keywords = array();
        foreach($xml->keywords->keyword as $keyword)
        {
            $keywords[] = (string) $keyword;
        }

        $audio->setKeywords($keywords);

        return $audio;
    }
}