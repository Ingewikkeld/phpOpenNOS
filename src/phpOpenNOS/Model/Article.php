<?php
/**
 * phpOpenNOS
 *
 * @category   phpOpenNOS
 * @package    Model
 * @copyright  Copyright (c) 2010-2011 Stefan Koopmanschap
 */

namespace phpOpenNOS\Model;

/**
 * Article model class respresents article data coming from the API
 *
 * @author Stefan Koopmanschap <left@leftontheweb.com>
 */
class Article extends Base
{
    /**
     * Create an Article object from XML
     *
     * @param SimpleXMLElement $xml simpleXML element containing a single article XML
     *
     * @static
     *
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