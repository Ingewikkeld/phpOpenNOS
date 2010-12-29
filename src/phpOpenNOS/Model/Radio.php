<?php

namespace phpOpenNOS\Model;

use phpOpenNOS\Model\BaseGuide;

class Radio extends BaseGuide
{
    static public function fromXML(\SimpleXMLElement $xml)
    {
        return parent::baseFromXML('phpOpenNOS\Model\Radio', $xml);
    }
}