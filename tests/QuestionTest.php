<?php

namespace Devfaysal\Laraqa\Tests;


use Orchestra\Testbench\TestCase;
use Devfaysal\Laraqa\LaraqaServiceProvider;



class QuestionTest extends TestCase
{

        /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->loadLaravelMigrations(['--database' => 'testing']);
    }
    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }
    /**
     * Get package providers.  At a minimum this is the package being tested, but also
     * would include packages upon which our package depends, e.g. Cartalyst/Sentry
     * In a normal app environment these would be added to the 'providers' array in
     * the config/app.php file.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        
        return [

            LaraqaServiceProvider::class,

        ];

    }
    /**
     * Get package aliases.  In a normal app environment these would be added to
     * the 'aliases' array in the config/app.php file.  If your package exposes an
     * aliased facade, you should add the alias here, along with aliases for
     * facades upon which your package depends, e.g. Cartalyst/Sentry.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            //'Sentry' => 'Cartalyst\Sentry\Facades\Laravel\Sentry',
            //'YourPackage' => 'YourProject\YourPackage\Facades\YourPackage',
        ];
    }


    
    /** @test */

    public function the_routes_can_be_accessed()
    {

        $this->get('/questions')->assertStatus(200);

        $this->get('/questions/create')->assertStatus(200);

    }

    /** @test */

    public function show_question_create_form()
    {

        $this->get('/questions/create')
            ->assertSee('Add new question');

    }

    /** @test */

    public function question_can_be_asked()
    {

        $attributes = [

            'name' => 'Faysal Ahamed',

            'email' => 'name@example.com',

            'body' => 'Lorem ipsum my question'

        ];

        $this->post('/questions', $attributes)
            ->assertDatabaseHas('questions', $attributes);

    }
    
}
