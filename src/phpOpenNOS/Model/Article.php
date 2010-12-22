<?php

namespace phpOpenNOS\Model;

use \Datetime;

class Article
{
    protected   $id,
                $title,
                $description,
                $published,
                $last_update,
                $thumbnail_xs,
                $thumbnail_s,
                $thumbnail_m,
                $link,
                $keywords = array();

    /**
     * Get the ID
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the ID
     *
     * @param int $id
     * @return void
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get the title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get the published date in the specified format
     *
     * @param string $format
     * @return string
     */
    public function getPublished($format)
    {
        return $this->published->format($format);
    }

    /**
     * Set the published date
     *
     * @param string $published
     * @return void
     */
    public function setPublished($published)
    {
        $this->published = new Datetime($published);
    }

    /**
     * Get the last update date in the specified format
     *
     * @param string $format
     * @return string
     */
    public function getLastUpdate($format)
    {
        return $this->last_update->format($format);
    }

    /**
     * Set the last update date
     *
     * @param string $last_update
     * @return void
     */
    public function setLastUpdate($last_update)
    {
        $this->last_update = new Datetime($last_update);
    }

    /**
     * Get the extra small thumbnail URL
     *
     * @return string
     */
    public function getThumbnailXS()
    {
        return $this->thumbnail_xs;
    }

    /**
     * Set the extra small thumbnail URL
     *
     * @param string $thumbnail_xs
     * @return void
     */
    public function setThumbnailXS($thumbnail_xs)
    {
        $this->thumbnail_xs = $thumbnail_xs;
    }

    /**
     * Get the small thumbnail URL
     *
     * @return string
     */
    public function getThumbnailS()
    {
        return $this->thumbnail_s;
    }

    /**
     * Set the small thumbnail URL
     *
     * @param string $thumbnail_s
     * @return void
     */
    public function setThumbnailS($thumbnail_s)
    {
        $this->thumbnail_s = $thumbnail_s;
    }

    /**
     * Get the medium thumbnail URL
     *
     * @return string
     */
    public function getThumbnailM()
    {
        return $this->thumbnail_m;
    }

    /**
     * Set the medium thumbnail URL
     *
     * @param string $thumbnail_m
     * @return void
     */
    public function setThumbnailM($thumbnail_m)
    {
        $this->thumbnail_m = $thumbnail_m;
    }

    /**
     * Get the link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set the link
     *
     * @param string $link
     * @return void
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * Get the keywords
     *
     * @return array
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Set the keywords
     *
     * @param array $keywords
     * @return void
     */
    public function setKeywords(array $keywords)
    {
        $this->keywords = $keywords;
    }

    /**
     * Check if the article has the specified keyword
     *
     * @param string $keyword
     * @return bool
     */
    public function hasKeyword($keyword)
    {
        return in_array($keyword, $this->keywords);
    }

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