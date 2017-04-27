<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewCalendarTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_can_view_calendar()
    {

        $response = $this->get('/fdsfds');

        $response->assertStatus(200);



    }
}
