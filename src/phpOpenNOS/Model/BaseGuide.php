<?php
/**
 * phpOpenNOS
 *
 * @category    phpOpenNOS
 * @package     Model
 * @author      Stefan Koopmanschap <left@leftontheweb.com>
 * @copyright   2010-2011 Stefan Koopmanschap
 */

namespace phpOpenNOS\Model;

/**
 * Base guide model class
 *
 * @author      Stefan Koopmanschap <left@leftontheweb.com>
 * @category    phpOpenNOS
 * @package     Model
 */
class BaseGuide
{
    protected   $id,
                $channel_icon,
                $channel_code,
                $channel_name,
                $starttime,
                $endtime,
                $genre,
                $title,
                $description;

    /**
     * Get the ID
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the ID
     *
     * @param integer $id ID of the item
     *
     * @return void
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get the channel icon URL
     *
     * @return string
     */
    public function getChannelIcon()
    {
        return $this->channel_icon;
    }

    /**
     * Set the channel icon URL
     *
     * @param string $channel_icon URL of the channel icon
     *
     * @return void
     */
    public function setChannelIcon($channel_icon)
    {
        $this->channel_icon = $channel_icon;
    }

    /**
     * Get the channel code
     *
     * @return string
     */
    public function getChannelCode()
    {
        return $this->channel_code;
    }

    /**
     * Set the channel code
     *
     * @param string $channel_code Code of the channel
     *
     * @return void
     */
    public function setChannelCode($channel_code)
    {
        $this->channel_code = $channel_code;
    }

    /**
     * Get the channel name
     *
     * @return string
     */
    public function getChannelName()
    {
        return $this->channel_name;
    }

    /**
     * Set the channel name
     *
     * @param string $channel_name Name of the channel
     *
     * @return void
     */
    public function setChannelName($channel_name)
    {
        $this->channel_name = $channel_name;
    }

    /**
     * Get the start time in the specified format
     *
     * @param string $format Format in which to output the start time
     *
     * @return string
     */
    public function getStarttime($format)
    {
        return $this->starttime->format($format);
    }

    /**
     * Set the starttime
     *
     * @param string $starttime Start time for the item
     *
     * @return void
     */
    public function setStarttime($starttime)
    {
        $this->starttime = new \Datetime($starttime);
    }

    /**
     * Get the end time in the specified format
     *
     * @param string $format Format in which to output the end time
     *
     * @return string
     */
    public function getEndtime($format)
    {
        return $this->endtime->format($format);
    }

    /**
     * Set the endtime
     *
     * @param string $endtime End time for the item
     *
     * @return void
     */
    public function setEndtime($endtime)
    {
        $this->endtime = new \Datetime($endtime);
    }

    /**
     * Get the genre
     *
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set the genre
     *
     * @param string $genre Genre for the item
     *
     * @return void
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
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
     * @param string $title Title for the item
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
     * @param string $description Description for the item
     *
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Convert XML to object
     *
     * @param string            $type Type of the item
     * @param SimpleXMLElement  $xml  SimpleXML element containing the data for a single item
     *
     * @static
     *
     * @return Tv|Radio
     */
    static public function baseFromXml($type, \SimpleXMLElement $xml)
    {
        $model = new $type();
        $model->setId((string) $xml->id);
        $model->setChannelCode((string) $xml->channel_code);
        $model->setChannelIcon((string) $xml->channel_icon);
        $model->setChannelName((string) $xml->channel_name);
        $model->setDescription((string) $xml->description);
        $model->setEndtime((string) $xml->endtime);
        $model->setGenre((string) $xml->genre);
        $model->setStarttime((string) $xml->starttime);
        $model->setTitle((string) $xml->title);

        return $model;
    }
}