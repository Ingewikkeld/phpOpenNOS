<?php

namespace phpOpenNOS\Model;

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
     * @param integer $id
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
     * @param string $channel_icon
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
     * @param string $channel_code
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
     * @param string $channel_name
     * @return void
     */
    public function setChannelName($channel_name)
    {
        $this->channel_name = $channel_name;
    }

    /**
     * Get the start time in the specified format
     *
     * @param string $format
     * @return string
     */
    public function getStarttime($format)
    {
        return $this->starttime->format($format);
    }

    /**
     * Set the starttime
     *
     * @param string $starttime
     * @return void
     */
    public function setStarttime($starttime)
    {
        $this->starttime = new \Datetime($starttime);
    }

    /**
     * Get the end time in the specified format
     *
     * @param string $format
     * @return string
     */
    public function getEndtime($format)
    {
        return $this->endtime->format($format);
    }

    /**
     * Set the endtime
     *
     * @param string $endtime
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
     * @param string $genre
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

    static public function baseFromXml($type, \SimpleXMLElement $xml)
    {
        $model = new $type();
        $model->setId($xml->id);
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