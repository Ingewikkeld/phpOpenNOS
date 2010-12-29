<?php

namespace phpOpenNOS\Model;

use phpOpenNOS\Model\BaseGuide;

class Tv extends BaseGuide
{
    static public function fromXML(\SimpleXMLElement $xml)
    {
        return parent::baseFromXML('phpOpenNOS\Model\Tv', $xml);
    }
}