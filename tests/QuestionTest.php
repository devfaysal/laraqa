<?php

namespace Devfaysal\Laraqa\Tests;


use Orchestra\Testbench\TestCase;
use Devfaysal\Laraqa\LaraqaServiceProvider;



class QuestionTest extends TestCase
{

    public function getPackageProviders($app)
    {
        
        return [

            LaraqaServiceProvider::class,

        ];

    }


    
    /** @test */

    public function the_route_can_be_accessed()
    {

        $this->get('/question')->assertStatus(200);

    }
    
}
