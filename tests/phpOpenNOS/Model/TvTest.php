<?php

namespace phpOpenNOS\Tests\Model;

require_once 'src/phpOpenNOS/Model/Tv.php';

use phpOpenNOS\Model\Tv;

class TvTest extends \PHPUnit_Framework_TestCase
{
    public function testFromXml()
    {
        $radio = Tv::fromXML(simplexml_load_string('<item>
                    <id>182884239</id>
                    <type><![CDATA[tv]]></type>
                    <channel_icon><![CDATA[http://open.nos.nl/img/icons/tv/nl2.png]]></channel_icon>
                    <channel_code><![CDATA[NL2]]></channel_code>
                    <channel_name><![CDATA[Nederland 2]]></channel_name>
                    <starttime><![CDATA[2010-12-29 02:00:00]]></starttime>
                    <endtime><![CDATA[2010-12-29 06:00:00]]></endtime>
                    <genre><![CDATA[Informatief]]></genre>
                    <title><![CDATA[NOS Tekst tv]]></title>
                    <description><![CDATA[Informatie uit Teletekst.]]></description>
                    </item>'));

        $this->assertEquals($radio->getId(), '182884239');
        $this->assertEquals($radio->getChannelIcon(), 'http://open.nos.nl/img/icons/tv/nl2.png');
        $this->assertEquals($radio->getChannelCode(), 'NL2');
        $this->assertEquals($radio->getChannelName(), 'Nederland 2');
        $this->assertEquals($radio->getStarttime('d-m-Y G:i:s'), '29-12-2010 2:00:00');
        $this->assertEquals($radio->getEndtime('d-m-Y G:i:s'), '29-12-2010 6:00:00');
        $this->assertEquals($radio->getGenre(), 'Informatief');
        $this->assertEquals($radio->getTitle(), 'NOS Tekst tv');
        $this->assertEquals($radio->getDescription(), 'Informatie uit Teletekst.');
    }
}