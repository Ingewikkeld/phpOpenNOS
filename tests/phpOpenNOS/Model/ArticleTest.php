<?php

namespace phpOpenNOS\Tests\Model;

require 'src/phpOpenNOS/Model/Base.php';
require 'src/phpOpenNOS/Model/Article.php';

use phpOpenNOS\Model\Article;

class ArticleTest extends \PHPUnit_Framework_TestCase
{
    public function testFromXML()
    {
        $xml = simplexml_load_string('<article>
                <id>208393</id>
                <type><![CDATA[article]]></type>
                <title><![CDATA[Detroit verslaat koploper Boston]]></title>
                <description><![CDATA[In de Eastern Conference van de NBA heeft koploper Boston Celtics met 104-92 verloren bij Detroit Pistons.]]></description>
                <published><![CDATA[2010-12-30 08:41:03]]></published>
                <last_update><![CDATA[2010-12-30 08:44:02]]></last_update>
                <thumbnail_xs><![CDATA[http://content.nos.nl/data/image/xs/2010/01/23/131259.jpg]]></thumbnail_xs>
                <thumbnail_s><![CDATA[http://content.nos.nl/data/image/s/2010/01/23/131259.jpg]]></thumbnail_s>
                <thumbnail_m><![CDATA[http://content.nos.nl/data/image/m/2010/01/23/131259.jpg]]></thumbnail_m>
                <link><![CDATA[http://nos.nl/artikel/208393-detroit-verslaat-koploper-boston.html]]></link>
                <keywords><keyword><![CDATA[basketbal]]></keyword><keyword><![CDATA[NBA]]></keyword><keyword><![CDATA[Kevin Garnett]]></keyword><keyword><![CDATA[Tracy McGrady]]></keyword><keyword><![CDATA[Lamar Odom]]></keyword></keywords></article>');

        $article = Article::fromXML($xml);
        $this->assertEquals($article->getId(), '208393');
        $this->assertEquals($article->getTitle(), 'Detroit verslaat koploper Boston');
        $this->assertEquals($article->getDescription(), 'In de Eastern Conference van de NBA heeft koploper Boston Celtics met 104-92 verloren bij Detroit Pistons.');
        $this->assertEquals($article->getPublished('d-m-Y G:i:s'), '30-12-2010 8:41:03');
        $this->assertEquals($article->getLastUpdate('d-m-Y G:i:s'), '30-12-2010 8:44:02');
        $this->assertEquals($article->getThumbnailXS(), 'http://content.nos.nl/data/image/xs/2010/01/23/131259.jpg');
        $this->assertEquals($article->getThumbnailS(), 'http://content.nos.nl/data/image/s/2010/01/23/131259.jpg');
        $this->assertEquals($article->getThumbnailM(), 'http://content.nos.nl/data/image/m/2010/01/23/131259.jpg');
        $this->assertEquals($article->getLink(), 'http://nos.nl/artikel/208393-detroit-verslaat-koploper-boston.html');
        $this->assertEquals($article->getKeywords(), array('basketbal', 'NBA', 'Kevin Garnett', 'Tracy McGrady', 'Lamar Odom'));
    }
}