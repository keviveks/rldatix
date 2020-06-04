<?php

use PHPUnit\Framework\TestCase;
use RLDatix\Service\PalindromService;

class PalindromServiceTest extends TestCase
{
    private $_palindromService;

    /**
     * @before
     */
    public function setUpSomeSharedFixtures()
    {
        $this->_palindromService = new PalindromService();
    }

    public function testPalindromString()
    {
        $string = 'wow';
        $result = $this->_palindromService->checkPalindrom($string);
        $this->assertTrue($result);
    }

    public function testNonPalindromString()
    {
        $string = 'womkjhkw';
        $result = $this->_palindromService->checkPalindrom($string);
        $this->assertFalse($result);
    }

    public function testNumberPalindromString()
    {
        $string = '1223221';
        $result = $this->_palindromService->checkPalindrom($string);
        $this->assertTrue($result);
    }

    public function testNumberonPalindromString()
    {
        $string = '123123';
        $result = $this->_palindromService->checkPalindrom($string);
        $this->assertFalse($result);
    }
}
