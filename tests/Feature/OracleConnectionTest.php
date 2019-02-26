<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OracleConnectionTest extends TestCase
{
    public function testCanConnectToDatabase()
    {
        $this->assertTrue($this->app->get('em')->getConnection()->connect());
    }
}
