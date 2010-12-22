<?php

namespace phpOpenNOS\Model;

use \Datetime;

class Video extends Base
{
    protected $embedcode;

    public function getEmbedCode()
    {
        return $this->embedcode;
    }

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
        $article = new Video();
        $article->setId((int) $xml->id);
        $article->setTitle((string) $xml->title);
        $article->setDescription((string) $xml->description);
        $article->setPublished((string) $xml->published);
        $article->setLastUpdate((string) $xml->last_update);
        $article->setThumbnailXS((string) $xml->thumbnail_xs);
        $article->setThumbnailS((string) $xml->thumbnail_s);
        $article->setThumbnailM((string) $xml->thumbnail_m);
        $article->setLink((string) $xml->link);
        $article->setEmbedCode((string) $xml->embedcode);

        $keywords = array();
        foreach($xml->keywords->keyword as $keyword)
        {
            $keywords[] = (string) $keyword;
        }

        $article->setKeywords($keywords);

        return $article;
    }
}