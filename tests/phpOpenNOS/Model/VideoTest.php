<?php

namespace phpOpenNOS\Tests\Model;

require_once 'src/phpOpenNOS/Model/Base.php';
require_once 'src/phpOpenNOS/Model/BaseGuide.php';
require_once 'src/phpOpenNOS/Model/Video.php';

use phpOpenNOS\Model\Video;

class VideoTest extends \PHPUnit_Framework_TestCase
{
    public function testEmbedCode()
    {
        $audio = new Video();
        $audio->setEmbedCode('<object width="550" height="309"><param name="movie" value="http://s.nos.nl/swf/embed/nos_partner_video.swf?tcmid=tcm-5-870642&platform=open&partner=speeltuin"></param><param name="wmode" value="transparent"></param><param name="allowScriptAccess" value="always"></param><param name="allowfullscreen" value="true"></param><embed src="http://s.nos.nl/swf/embed/nos_partner_video.swf?tcmid=tcm-5-870642&platform=open&partner=speeltuin" type="application/x-shockwave-flash" wmode="transparent" width="550" height="309" allowfullscreen="true" allowScriptAccess="always"></embed></object>');

        $this->assertEquals($audio->getEmbedCode(), '<object width="550" height="309"><param name="movie" value="http://s.nos.nl/swf/embed/nos_partner_video.swf?tcmid=tcm-5-870642&platform=open&partner=speeltuin"></param><param name="wmode" value="transparent"></param><param name="allowScriptAccess" value="always"></param><param name="allowfullscreen" value="true"></param><embed src="http://s.nos.nl/swf/embed/nos_partner_video.swf?tcmid=tcm-5-870642&platform=open&partner=speeltuin" type="application/x-shockwave-flash" wmode="transparent" width="550" height="309" allowfullscreen="true" allowScriptAccess="always"></embed></object>');
    }

    public function testFromXML()
    {
        $xml = simplexml_load_string('<video>
                <id>208363</id>
                <type><![CDATA[video]]></type>
                <title><![CDATA[Blangé: "Ik zag nog wel perspectief"]]></title>
                <description><![CDATA[Peter Blangé, die als speler in 1996 legendarisch volleybalgoud bij de Olympische Spelen won, stopt als bondscoach van de mannen. De successen zijn uitgebleven sinds zijn aantreden in 2006 en dat is voor Blangé en de volleybalbond reden om uit elkaar te gaan.]]></description>
                <published><![CDATA[2010-12-29 23:25:03]]></published>
                <last_update><![CDATA[2010-12-30 00:07:04]]></last_update>
                <thumbnail_xs><![CDATA[http://content.nos.nl/data/video/xs/2010/12/29/SOblange------CSO101229GE_1.jpg]]></thumbnail_xs>
                <thumbnail_s><![CDATA[http://content.nos.nl/data/video/s/2010/12/29/SOblange------CSO101229GE_1.jpg]]></thumbnail_s>
                <thumbnail_m><![CDATA[http://content.nos.nl/data/video/m/2010/12/29/SOblange------CSO101229GE_1.jpg]]></thumbnail_m>
                <link><![CDATA[http://nos.nl/video/208363-blange-ik-zag-nog-wel-perspectief.html]]></link>
                <embedcode><![CDATA[<object width="550" height="309"><param name="movie" value="http://s.nos.nl/swf/embed/nos_partner_video.swf?tcmid=tcm-5-870642&platform=open&partner=speeltuin"></param><param name="wmode" value="transparent"></param><param name="allowScriptAccess" value="always"></param><param name="allowfullscreen" value="true"></param><embed src="http://s.nos.nl/swf/embed/nos_partner_video.swf?tcmid=tcm-5-870642&platform=open&partner=speeltuin" type="application/x-shockwave-flash" wmode="transparent" width="550" height="309" allowfullscreen="true" allowScriptAccess="always"></embed></object>]]></embedcode>
                <keywords><keyword><![CDATA[Volleybal]]></keyword><keyword><![CDATA[Peter Blangé]]></keyword><keyword><![CDATA[nevobo]]></keyword></keywords></video>');

        $video = Video::fromXML($xml);
        $this->assertEquals($video->getId(), '208363');
        $this->assertEquals($video->getTitle(), 'Blangé: "Ik zag nog wel perspectief"');
        $this->assertEquals($video->getDescription(), 'Peter Blangé, die als speler in 1996 legendarisch volleybalgoud bij de Olympische Spelen won, stopt als bondscoach van de mannen. De successen zijn uitgebleven sinds zijn aantreden in 2006 en dat is voor Blangé en de volleybalbond reden om uit elkaar te gaan.');
        $this->assertEquals($video->getPublished('d-m-Y G:i:s'), '29-12-2010 23:25:03');
        $this->assertEquals($video->getLastUpdate('d-m-Y G:i:s'), '30-12-2010 0:07:04');
        $this->assertEquals($video->getThumbnailXS(), 'http://content.nos.nl/data/video/xs/2010/12/29/SOblange------CSO101229GE_1.jpg');
        $this->assertEquals($video->getThumbnailS(), 'http://content.nos.nl/data/video/s/2010/12/29/SOblange------CSO101229GE_1.jpg');
        $this->assertEquals($video->getThumbnailM(), 'http://content.nos.nl/data/video/m/2010/12/29/SOblange------CSO101229GE_1.jpg');
        $this->assertEquals($video->getLink(), 'http://nos.nl/video/208363-blange-ik-zag-nog-wel-perspectief.html');
        $this->assertEquals($video->getKeywords(), array('Volleybal', 'Peter Blangé', 'nevobo'));
        $this->assertEquals($video->getEmbedCode(), '<object width="550" height="309"><param name="movie" value="http://s.nos.nl/swf/embed/nos_partner_video.swf?tcmid=tcm-5-870642&platform=open&partner=speeltuin"></param><param name="wmode" value="transparent"></param><param name="allowScriptAccess" value="always"></param><param name="allowfullscreen" value="true"></param><embed src="http://s.nos.nl/swf/embed/nos_partner_video.swf?tcmid=tcm-5-870642&platform=open&partner=speeltuin" type="application/x-shockwave-flash" wmode="transparent" width="550" height="309" allowfullscreen="true" allowScriptAccess="always"></embed></object>');
    }
}