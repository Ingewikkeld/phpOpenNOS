<?php

namespace phpOpenNOS\Tests\Model;

require_once 'src/phpOpenNOS/Model/Radio.php';

use phpOpenNOS\Model\Radio;

class RadioTest extends \PHPUnit_Framework_TestCase
{
    public function testFromXml()
    {
        $radio = Radio::fromXML(simplexml_load_string('<item>
                                    <id>183899291</id>
                                    <type><![CDATA[radio]]></type>
                                    <channel_icon><![CDATA[http://open.nos.nl/img/icons/radio/ra5.png]]></channel_icon>
                                    <channel_code><![CDATA[RA5]]></channel_code>
                                    <channel_name><![CDATA[Radio 5]]></channel_name>
                                    <starttime><![CDATA[2010-12-29 06:00:00]]></starttime>
                                    <endtime><![CDATA[2010-12-29 06:01:00]]></endtime>
                                    <genre><![CDATA[Nieuws/actualiteiten]]></genre>
                                    <title><![CDATA[Nieuws]]></title>
                                    <description><![CDATA[]]></description>
                                    </item>'));

        $this->assertEquals($radio->getId(), '183899291');
        $this->assertEquals($radio->getChannelIcon(), 'http://open.nos.nl/img/icons/radio/ra5.png');
        $this->assertEquals($radio->getChannelCode(), 'RA5');
        $this->assertEquals($radio->getChannelName(), 'Radio 5');
        $this->assertEquals($radio->getStarttime('d-m-Y G:i:s'), '29-12-2010 6:00:00');
        $this->assertEquals($radio->getEndtime('d-m-Y G:i:s'), '29-12-2010 6:01:00');
        $this->assertEquals($radio->getGenre(), 'Nieuws/actualiteiten');
        $this->assertEquals($radio->getTitle(), 'Nieuws');
        $this->assertEquals($radio->getDescription(), '');
    }
}