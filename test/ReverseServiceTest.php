<?php

use PHPUnit\Framework\TestCase;
use RLDatix\Service\ReverseService;

class ReverseServiceTest extends TestCase
{
    private $_reverseService;

    /**
     * @before
     */
    public function setUpSomeSharedFixtures()
    {
        $this->_reverseService = new ReverseService();
    }

    public function testReverseString()
    {
        $string = 'randomstring';
        $result = $this->_reverseService->reverseWord($string);
        $expectedResult = 'gnirtsmodnar';
        $this->assertEquals($result, $expectedResult);
    }

    public function testReverseNumberString()
    {
        $string = '123123123';
        $result = $this->_reverseService->reverseWord($string);
        $expectedResult = '321321321';
        $this->assertEquals($result, $expectedResult);
    }
}
