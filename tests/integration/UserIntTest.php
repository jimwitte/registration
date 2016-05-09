<?php
/**
 *
 *
 * Date: 2/29/16
 * Time: 1:02 PM
 */


use App\User;
use App\Session;

use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserIntTest extends \TestCase
{
    use DatabaseTransactions;

    public $user;
    public $session;

    public function setUp()
    {
        parent::setUp();
        factory(User::class,3)->create();
        factory(Session::class,3)->create();
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    /** @test */
    public function a_user_can_sign_up_for_a_session()
    {

        $this->user = User::first();
        $this->session = Session::first();

        //attach first session to first user
        $this->user->sessions()->attach($this->session->id);

        // id of the first attached session should be the id of the session fetched
        $this->assertEquals($this->session->id,$this->user->sessions()->first()->id);
    }

    /** @test */
    public function user_registers_for_session()
    {
        $this->user = User::first();
        $this->session = Session::first();

        $this->user->addSession($this->session);
        $userSessions = $this->user->sessions->toArray();
        $this->assertArrayHasKey($this->session->id, $userSessions);

    }
    /** @test */
    public function session_adds_user() {
        $this->user = User::first();
        $this->session = Session::first();

        $this->session->addUser($this->user);
        $sessionUsers = $this->session->users->toArray();
        $this->assertArrayHasKey($this->user->id, $sessionUsers);

    }
}