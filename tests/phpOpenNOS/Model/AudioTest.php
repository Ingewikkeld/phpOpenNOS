<?php

namespace phpOpenNOS\Tests\Model;

require_once 'src/phpOpenNOS/Model/BaseGuide.php';
require_once 'src/phpOpenNOS/Model/Audio.php';

use phpOpenNOS\Model\Audio;

class AudioTest extends \PHPUnit_Framework_Testcase
{
    public function testEmbedCode()
    {
        $audio = new Audio();
        $audio->setEmbedCode('<object width="550" height="309"><param name="movie" value="http://s.nos.nl/swf/embed/nos_partner_video.swf?tcmid=tcm-5-870639&platform=open&partner=speeltuin"></param><param name="wmode" value="transparent"></param><param name="allowScriptAccess" value="always"></param><param name="allowfullscreen" value="true"></param><embed src="http://s.nos.nl/swf/embed/nos_partner_video.swf?tcmid=tcm-5-870639&platform=open&partner=speeltuin" type="application/x-shockwave-flash" wmode="transparent" width="550" height="309" allowfullscreen="true" allowScriptAccess="always"></embed></object>');

        $this->assertEquals($audio->getEmbedCode(), '<object width="550" height="309"><param name="movie" value="http://s.nos.nl/swf/embed/nos_partner_video.swf?tcmid=tcm-5-870639&platform=open&partner=speeltuin"></param><param name="wmode" value="transparent"></param><param name="allowScriptAccess" value="always"></param><param name="allowfullscreen" value="true"></param><embed src="http://s.nos.nl/swf/embed/nos_partner_video.swf?tcmid=tcm-5-870639&platform=open&partner=speeltuin" type="application/x-shockwave-flash" wmode="transparent" width="550" height="309" allowfullscreen="true" allowScriptAccess="always"></embed></object>');
    }

    public function testFromXML()
    {
        $xml = simplexml_load_string('<video>
                                        <id>208359</id>
                                        <type><![CDATA[audio]]></type>
                                        <title><![CDATA[Ex-bondscoach Blangé bij Langs de Lijn]]></title>
                                        <description><![CDATA[De volleybalbond en mannenbondscoach Peter Blangé hebben tussentijds afscheid van elkaar genomen. Langs de Lijn-presentator Robbert Meeder vraagt studiogast Blangé naar het waarom van de breuk.]]></description>
                                        <published><![CDATA[2010-12-29 22:52:00]]></published>
                                        <last_update><![CDATA[2010-12-29 23:00:09]]></last_update>
                                        <thumbnail><![CDATA[]]></thumbnail>
                                        <link><![CDATA[http://nos.nl/audio/208359-exbondscoach-blange-bij-langs-de-lijn.html]]></link>
                                        <embedcode><![CDATA[<object width="550" height="309"><param name="movie" value="http://s.nos.nl/swf/embed/nos_partner_video.swf?tcmid=tcm-5-870639&platform=open&partner=speeltuin"></param><param name="wmode" value="transparent"></param><param name="allowScriptAccess" value="always"></param><param name="allowfullscreen" value="true"></param><embed src="http://s.nos.nl/swf/embed/nos_partner_video.swf?tcmid=tcm-5-870639&platform=open&partner=speeltuin" type="application/x-shockwave-flash" wmode="transparent" width="550" height="309" allowfullscreen="true" allowScriptAccess="always"></embed></object>]]></embedcode>
                                        <keywords><keyword><![CDATA[Volleybal]]></keyword><keyword><![CDATA[Peter Blangé]]></keyword></keywords></video>');

        $audio = Audio::fromXML($xml);
        $this->assertEquals($audio->getId(), '208359');
        $this->assertEquals($audio->getTitle(), 'Ex-bondscoach Blangé bij Langs de Lijn');
        $this->assertEquals($audio->getDescription(), 'De volleybalbond en mannenbondscoach Peter Blangé hebben tussentijds afscheid van elkaar genomen. Langs de Lijn-presentator Robbert Meeder vraagt studiogast Blangé naar het waarom van de breuk.');
        $this->assertEquals($audio->getPublished('d-m-Y G:i:s'), '29-12-2010 22:52:00');
        $this->assertEquals($audio->getLastUpdate('d-m-Y G:i:s'), '29-12-2010 23:00:09');
        $this->assertEquals($audio->getThumbnailXS(), '');
        $this->assertEquals($audio->getThumbnailS(), '');
        $this->assertEquals($audio->getThumbnailM(), '');
        $this->assertEquals($audio->getLink(), 'http://nos.nl/audio/208359-exbondscoach-blange-bij-langs-de-lijn.html');
        $this->assertEquals($audio->getKeywords(), array('Volleybal', 'Peter Blangé'));
        $this->assertEquals($audio->getEmbedCode(), '<object width="550" height="309"><param name="movie" value="http://s.nos.nl/swf/embed/nos_partner_video.swf?tcmid=tcm-5-870639&platform=open&partner=speeltuin"></param><param name="wmode" value="transparent"></param><param name="allowScriptAccess" value="always"></param><param name="allowfullscreen" value="true"></param><embed src="http://s.nos.nl/swf/embed/nos_partner_video.swf?tcmid=tcm-5-870639&platform=open&partner=speeltuin" type="application/x-shockwave-flash" wmode="transparent" width="550" height="309" allowfullscreen="true" allowScriptAccess="always"></embed></object>');
    }
}