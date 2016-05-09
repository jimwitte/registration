<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

class UserFuncTest extends \TestCase
{

    protected $user;

    function setUp()
    {
        parent::setUp();
        factory(User::class,3)->create();
    }

    function tearDown()
    {
        parent::tearDown();
    }

    /** @test */
    public function an_admin_can_view_user_page()
    {

        $this->user = User::first();
        $this->user->isAdmin = true;
        $this->user->save();
        Auth::loginUsingId($this->user->id);
        $response = $this->call('GET', '/user/1');
        $this->assertEquals(200, $response->status());

    }

    /** @test */
    public function non_admin_may_not_see_user_page()
    {
        $this->user = User::first();
        $this->user->isAdmin = false;
        $this->user->save();
        Auth::loginUsingId($this->user->id);

        $response = $this->call('GET', '/user/1');
        $this->assertEquals(403, $response->status());

    }

}
