<?php
/**
 * phpOpenNOS
 *
 * @category   phpOpenNOS
 * @package    Model
 * @copyright  Copyright (c) 2010-2011 Stefan Koopmanschap
 */

namespace phpOpenNOS\Model;

use \Datetime;

/**
 * Base model class
 *
 * @author Stefan Koopmanschap <left@leftontheweb.com>
 */
class Base
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
     * @param int $id ID of the item
     *
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
     * @param string $title Title of the item
     *
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
     * @param string $description Description of the item
     *
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get the published date in the specified format
     *
     * @param string $format Format in which to get the published date
     *
     * @return string
     */
    public function getPublished($format)
    {
        return $this->published->format($format);
    }

    /**
     * Set the published date
     *
     * @param string $published Published date for the item
     *
     * @return void
     */
    public function setPublished($published)
    {
        $this->published = new Datetime($published);
    }

    /**
     * Get the last update date in the specified format
     *
     * @param string $format Format in which to get the update date
     *
     * @return string
     */
    public function getLastUpdate($format)
    {
        return $this->last_update->format($format);
    }

    /**
     * Set the last update date
     *
     * @param string $last_update Late update date for the item
     *
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
     * @param string $thumbnail_xs URL of the extra small thumbnail for the item
     *
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
     * @param string $thumbnail_s URL of the small thumbnail for the item
     *
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
     * @param string $thumbnail_m URL of the medium thumbnail for the item
     *
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
     * @param string $link Link for the item
     *
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
     * @param array $keywords Keywords for the item
     *
     * @return void
     */
    public function setKeywords(array $keywords)
    {
        $this->keywords = $keywords;
    }

    /**
     * Check if the article has the specified keyword
     *
     * @param string $keyword Keyword to check
     *
     * @return bool
     */
    public function hasKeyword($keyword)
    {
        return in_array($keyword, $this->keywords);
    }

}