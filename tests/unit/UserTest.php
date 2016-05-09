<?php
/**
 *
 *
 * Date: 2/28/16
 * Time: 11:14 AM
 */

use \App\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
    protected $user;
    protected $session;

    public function setUp()
    {
        parent::setUp();
        $this->user = new User;
        $this->user->firstName = 'John';
        $this->user->lastName = 'Smith';
        $this->user->isAdmin = TRUE;
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    /** @test */
    function test_a_user_has_a_first_and_last_name()
    {
        $this->assertEquals('John',$this->user->firstName);
        $this->assertEquals('Smith',$this->user->lastName);
    }
    /** @test */
    function test_a_user_can_be_an_admin()
    {
        $this->assertTrue($this->user->isAdmin());
    }
    
    /** @test */
    function test_is_profile_complete() {
        $this->user = factory(App\User::class)->create();
        $this->assertTrue($this->user->profileComplete);
    }

}