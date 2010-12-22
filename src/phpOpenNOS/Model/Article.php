<?php

namespace phpOpenNOS\Model;

class Article extends Base
{
    /**
     * Create an Article object from XML
     *
     * @static
     * @param SimpleXMLElement $xml
     * @return phpOpenNOS\Model\Article
     */
    static public function fromXML(\SimpleXMLElement $xml)
    {
        $article = new Article();
        $article->setId((int) $xml->id);
        $article->setTitle((string) $xml->title);
        $article->setDescription((string) $xml->description);
        $article->setPublished((string) $xml->published);
        $article->setLastUpdate((string) $xml->last_update);
        $article->setThumbnailXS((string) $xml->thumbnail_xs);
        $article->setThumbnailS((string) $xml->thumbnail_s);
        $article->setThumbnailM((string) $xml->thumbnail_m);
        $article->setLink((string) $xml->link);

        $keywords = array();
        foreach($xml->keywords->keyword as $keyword)
        {
            $keywords[] = (string) $keyword;
        }

        $article->setKeywords($keywords);

        return $article;
    }
}