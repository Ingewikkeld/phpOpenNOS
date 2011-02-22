<?php

namespace phpOpenNOS\Tests\Model;

require_once 'src/phpOpenNOS/Model/Dayguide.php';
require_once 'src/phpOpenNOS/Model/Tv.php';

use phpOpenNOS\Model\Dayguide;

class DayguideTest extends \PHPUnit_Framework_TestCase
{
    public function testItems()
    {
        $dayguide = new Dayguide();

        $item1 = new \stdClass();
        $dayguide->addItem($item1);

        $this->assertEquals($dayguide->getItems(), array($item1));

        $item2 = new \stdClass();
        $item2->test = 'test';

        $dayguide->addItem($item2);

        $this->assertEquals($dayguide->getItems(), array($item1, $item2));
    }

    public function testDate()
    {
        $dayguide = new Dayguide();

        $dayguide->setDate('2010-12-30');

        $this->assertEquals($dayguide->getDate('d-m-Y'), '30-12-2010');
    }

    public function testFromXml()
    {
        $dayguide = Dayguide::fromXml(simplexml_load_string('<dayguide type="tv" date="2010-12-29"><item>
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
                                        </item>
                                        <item>
                                        <id>182342528</id>
                                        <type><![CDATA[tv]]></type>
                                        <channel_icon><![CDATA[http://open.nos.nl/img/icons/tv/nl1.png]]></channel_icon>
                                        <channel_code><![CDATA[NL1]]></channel_code>
                                        <channel_name><![CDATA[Nederland 1]]></channel_name>
                                        <starttime><![CDATA[2010-12-29 03:41:00]]></starttime>
                                        <endtime><![CDATA[2010-12-29 06:00:00]]></endtime>
                                        <genre><![CDATA[Informatief]]></genre>
                                        <title><![CDATA[NOS Tekst tv]]></title>
                                        <description><![CDATA[Informatie uit Teletekst.]]></description>
                                        </item>
                                        <item>
                                        <id>183724239</id>
                                        <type><![CDATA[tv]]></type>
                                        <channel_icon><![CDATA[http://open.nos.nl/img/icons/tv/nl1.png]]></channel_icon>
                                        <channel_code><![CDATA[NL1]]></channel_code>
                                        <channel_name><![CDATA[Nederland 1]]></channel_name>
                                        <starttime><![CDATA[2010-12-29 06:00:00]]></starttime>
                                        <endtime><![CDATA[2010-12-29 06:25:00]]></endtime>
                                        <genre><![CDATA[Informatief]]></genre>
                                        <title><![CDATA[NOS Tekst tv]]></title>
                                        <description><![CDATA[Informatie uit Teletekst.]]></description>
                                        </item>
                                        </dayguide>'));

        $this->assertEquals($dayguide->getDate('d-m-Y'), '29-12-2010');

        $items = $dayguide->getItems();

        $this->assertEquals(count($items), 3);
    }
}