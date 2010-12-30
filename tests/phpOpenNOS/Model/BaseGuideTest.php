<?php

namespace phpOpenNOS\Tests\Model;

require_once 'src/phpOpenNOS/Model/BaseGuide.php';

use phpOpenNOS\Model\BaseGuide;

class BaseGuideTest extends \PHPUnit_Framework_Testcase
{
    protected $base;

    public function setUp()
    {
        $this->base = new BaseGuide();
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

    public function testStarttime()
    {
        $this->base->setStarttime('2010-12-30 13:19:23');
        $this->assertEquals($this->base->getStarttime('d-m-Y G:i:s'), '30-12-2010 13:19:23');
    }

    public function testEndtime()
    {
        $this->base->setEndtime('2010-12-30 14:01:23');
        $this->assertEquals($this->base->getEndtime('d-m-Y G:i:s'), '30-12-2010 14:01:23');
    }

    public function testGenre()
    {
        $this->base->setGenre('Voetbal');
        $this->assertEquals($this->base->getGenre(), 'Voetbal');
    }

    public function testChannelIcon()
    {
        $this->base->setChannelIcon('http://open.nos.nl/img/icons/tv/nl1.png');
        $this->assertEquals($this->base->getChannelIcon(), 'http://open.nos.nl/img/icons/tv/nl1.png');
    }

    public function testChannelCode()
    {
        $this->base->setChannelCode('NL1');
        $this->assertEquals($this->base->getChannelCode(), 'NL1');
    }

    public function testChannelName()
    {
        $this->base->setChannelName('Nederland 1');
        $this->assertEquals($this->base->getChannelName(), 'Nederland 1');
    }
}