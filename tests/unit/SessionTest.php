<?php
/**
 *
 *
 * Date: 2/28/16
 * Time: 1:19 PM
 */

use \App\Session;

class SessionTest extends \PHPUnit_Framework_TestCase
{
    protected $session;

    public function setUp()
    {
        parent::setUp();
        $this->session = new Session;
        $this->session->title = 'Welcome to 101';
        $this->session->startTime = '10';
        $this->session->archived = FALSE;
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    /** @test */
    public function a_session_has_a_title()
    {
        $this->assertEquals('Welcome to 101',$this->session->title);
    }

    /** @test */
    public function a_session_has_a_time()
    {
        $this->assertEquals('10',$this->session->startTime);
    }
}