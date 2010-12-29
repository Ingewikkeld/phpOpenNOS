<?php

namespace phpOpenNOS\Model;

use phpOpenNOS\Model\Tv;

class Dayguide
{
    protected $items = array();
    protected $date;

    public function addItem($item)
    {
        $this->items[] = $item;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getDate($format)
    {
        return $this->date->format($format);
    }

    public function setDate($date)
    {
        $this->date = new \Datetime($date);
    }

    static public function fromXml(\SimpleXMLElement $dayguide)
    {
        $model = new Dayguide();
        $model->setDate($dayguide['date']);

        $type = 'phpOpenNOS\Model\\'.ucfirst($dayguide['type']);

        foreach($dayguide->item as $item)
        {
            $model->addItem($type::fromXML($item));
        }

        return $model;
    }

}