<?php

namespace phpOpenNOS\Tests\Model;

require_once 'src/phpOpenNOS/Model/Base.php';

use phpOpenNOS\Model\Base;

class BaseTest extends \PHPUnit_Framework_Testcase
{
    protected $base;

    public function setUp()
    {
        $this->base = new Base();
    }

    public function testId()
    {
        $this->base->setId(352035);
        $this->assertEquals($this->base->getId(), 352035);
    }

    public function testTitle()
    {
        $this->base->setTitle('Test title');
        $this->assertEquals($this->base->getTitle(), 'Test title');
    }

    public function testDescription()
    {
        $this->base->setDescription('Test Description');
        $this->assertEquals($this->base->getDescription(), 'Test Description');
    }

    public function testPublished()
    {
        $this->base->setPublished('2010-12-30 13:19:23');
        $this->assertEquals($this->base->getPublished('d-m-Y G:i:s'), '30-12-2010 13:19:23');
    }

    public function testLastUpdate()
    {
        $this->base->setPublished('2010-12-30 14:01:23');
        $this->assertEquals($this->base->getPublished('d-m-Y G:i:s'), '30-12-2010 14:01:23');
    }

    public function testThumbnails()
    {
        $this->base->setThumbnailXS('http://content.nos.nl/data/image/xs/2010/01/23/131259.jpg');
        $this->assertEquals($this->base->getThumbnailXS(), 'http://content.nos.nl/data/image/xs/2010/01/23/131259.jpg');

        $this->base->setThumbnailS('http://content.nos.nl/data/image/s/2010/01/23/131259.jpg');
        $this->assertEquals($this->base->getThumbnailS(), 'http://content.nos.nl/data/image/s/2010/01/23/131259.jpg');

        $this->base->setThumbnailM('http://content.nos.nl/data/image/m/2010/01/23/131259.jpg');
        $this->assertEquals($this->base->getThumbnailM(), 'http://content.nos.nl/data/image/m/2010/01/23/131259.jpg');
    }

    public function testLink()
    {
        $this->base->setLink('http://nos.nl/artikel/208393-detroit-verslaat-koploper-boston.html');
        $this->assertEquals($this->base->getLink(), 'http://nos.nl/artikel/208393-detroit-verslaat-koploper-boston.html');
    }

    public function testKeywords()
    {
        $this->base->setKeywords(array('test', 'php', 'nos', 'api'));
        $this->assertEquals($this->base->getKeywords(), array('test', 'php', 'nos', 'api'));
        $this->assertTrue($this->base->hasKeyword('php'));
        $this->assertFalse($this->base->hasKeyword('nothing'));
    }
}