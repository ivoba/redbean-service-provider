<?php

namespace Ivoba\Silex\Tests;

use Ivoba\Silex\RedBeanServiceProvider;
use Silex\Application;
use RedBeanPHP\R;

class RedBeanServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testRegister()
    {
        $app = new Application();

        $app->register(
            new RedBeanServiceProvider(),
            array(
                'db.options' => array(
                    'dsn' => 'sqlite:'.__DIR__.'/test.sqlite',
                ),
            )
        );
        $app['db'];//db init
        $this->assertSame('sqlite:'.__DIR__.'/test.sqlite', $app['db.options']['dsn']);
    }

    public function testDB()
    {
        $app = new Application();
        $app->register(
            new RedBeanServiceProvider(),
            array(
                'db.options' => array(
                    'dsn' => 'sqlite:'.__DIR__.'/test.sqlite',
                ),
            )
        );
        $app['db'];//db init
        $post = R::dispense('post');
        $post->text = 'Hello World';
        $id = R::store($post);       //Create or Update
        $fetchedPost = R::load('post', $id); //Retrieve
        $this->assertSame($post->text, $fetchedPost->text);
        $this->assertTrue(file_exists(__DIR__.'/test.sqlite'));
        unlink(__DIR__.'/test.sqlite');
    }

    protected function tearDown()
    {
        R::close();
        unset(R::$toolboxes['default']);
    }
}